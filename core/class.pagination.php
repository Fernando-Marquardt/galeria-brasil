<?php
/**
 * Classe para criação de paginação
 * 
 * Log:
 * 
 * Versão 0.8.1 - 23/07/2008
 * 		- Corrigida inconscistência no método {@link get()}, que fazia com que o mesmo retornasse valores incorretos
 * 
 * Versão 0.8.0 - 09/06/2008
 * 		- O método {@link set_template()} agora recebe apenas um parâmetro, sendo uma array contendo os templates
 * 
 * Versão 0.7.0 - 03/04/2008
 * 		- Foi acrescentado o parâmetro $extra à função {@link calc}
 * 
 * @author Fernando Marquardt <fernando.marquardt@gmail.com>
 * @version 0.8.1
 * @package Pagination
**/

class Pagination {
	/**
	 * Armazena todas as informações da classe
	 *
	 * @var mixed
	 */
	private $data = array();
	
	/**
	 * Armazena todos os templates da classe
	 *
	 * @var mixed
	 */
	private $template = array();
	
	/**
	 * Construtor da classe
	 *
	 * @param int $total Número total de itens/registros
	 * @param int $current_page Página atual
	 * @param int $perpage Quantidade de itens por página
	 * @param bool|int $limited Se for um valor numérico, limitará a quantiade de páginas númericas que podem ser visualizadas
	 * @return Pages
	 */
	public function Pagination($total, $current_page = 1, $perpage = 10, $limited = false) {
		$this->set('current_page', ((empty($current_page)) ? 1 : $current_page));
		$this->set('total', ((empty($total)) ? 0 : $total));
		$this->set('perpage', ((empty($perpage)) ? 10 : $perpage));
		
		$this->calc('all');
		
		if (is_numeric($limited)) {
			$this->set('limited', $limited);
		}
	}
	
	/**
	 * Atribui valores aos dados da classe contidas em {@link $data}
	 *
	 * @since 0.6
	 * @param string $data_name Nome do dado
	 * @param any $data_value Valor à ser atribuido
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * $pages->set('total', 176);
	 * </code>
	 */
	public function set($data_name, $data_value) {
		$this->data[$data_name] = $data_value;
	}
	
	/**
	 * Captura o valor do dado contida em {@link $data}
	 *
	 * @since 0.6
	 * @param string $data_name Nome do dado
	 * @return any
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * echo "Mostrado de ". $pages->get('start') ." à ". ($pages->get('start') + $pages->get('perpage')); // Mostrando de 20 à 29
	 * </code>
	 */
	public function get($data_name) {
		$this->calc('all');
		
		if (isset($this->data[$data_name])) {
			return $this->data[$data_name];
		} else {
			return false;
		}
	}
	
	/**
	 * Atribui templates aos elementos da classe. Todos os elementos, com exceção do elementos disabled e o main, possuem os atributos page, start e limit
	 * Estes elementos e seus atributos podem ser chamados dentro do template, como por exemplo: {next.page}.
	 * Nesse caso a string será substituida pelo número da próxima página
	 * 
	 * O elemento main possui os atributos referentes aos botões, que são: first, last, previous, next e number
	 * E também os valores contidos em {@link $data}
	 * 
	 * As templates devem ser atribuidas aos elementos, pois eles não possuem template padrão
	 * 
	 * Os elementos são:
	 * 		- first 		(0.6): Primeira página
	 * 		- last 			(0.6): Última página
	 * 		- previous		(0.6): Página anterior
	 * 		- next			(0.6): Próxima página
	 * 		- number		(0.6): Páginas numéricas
	 * 		- current_page 	(0.6): Página atual
	 * 		- main			(0.6): Representa toda a paginação
	 * 
	 * Há também os templates que representam os elementos desabilitadoos:
	 * 		- disabled_first	(0.6): Primeira página desabilitada
	 * 		- disabled_last		(0.6): Última página desabilitada
	 * 		- disabled_previous	(0.6): Página anterior desabilitada
	 * 		- disabled_next		(0.6): Próxima página desabilitada
	 *
	 * @since 0.6
	 * @param mixed $elements (0.8) Array contendo os templates dos elementos, o índice de cada registro deve ser o nome do elemento
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * $template = array('first' => '<a href="?page={first.page}&start={first.start}&limit={first.limit}">&laquo; Primeiro</a>');
	 * 
	 * $pages->set_template($template);
	 * </code>
	 */
	public function set_template($elements) {
		if (count($elements)) {
			foreach($elements as $element_name => $template) {
				$this->template[$element_name] = $template;
			}
			
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Captura o template do respectivo elemento
	 *
	 * @since 0.6
	 * @param string $element_name Nome do elemento
	 * @return string|bool
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * $first_template = $pages->get_template('first');
	 * </code>
	 */
	public function get_template($element_name) {
		if (isset($this->template[$element_name])) {
			return $this->template[$element_name];
		} else {
			return false;
		}
	}
	
	/**
	 * Renderiza a paginação
	 *
	 * @since 0.6
	 * @return bool
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * $pages->display();
	 * </code>
	 */
	public function display($return = false) {
		if (!$this->get('total') || !$this->get('perpage')) {
			return false;
		} else {
			$this->calc('all');
			
			$arr_replace['first'] = array(
				'page' => 1, 
				'start' =>  $this->calc('start', 1),
				'limit' => $this->get('perpage')
			);
			$arr_replace['previous'] = array(
				'page' => ($this->get('current_page') - 1), 
				'start' =>  $this->calc('start', $this->get('current_page') - 1), 
				'limit' => $this->get('perpage')
			);
			$arr_replace['next'] = array(
				'page' => ($this->get('current_page') + 1), 
				'start' =>  $this->calc('start', $this->get('current_page') + 1), 
				'limit' => $this->get('perpage')
			);
			$arr_replace['last'] = array(
				'page' => $this->get('pages'), 
				'start' =>  $this->calc('start', $this->get('pages')), 
				'limit' => $this->get('perpage')
			);
			
			if ($this->get('current_page') > 1) {
				$btn_replace['main']['first'] = $this->replace($arr_replace, $this->get_template('first'));
				$btn_replace['main']['previous'] = $this->replace($arr_replace, $this->get_template('previous'));
			} else {
				$btn_replace['main']['first'] = $this->replace($arr_replace, $this->get_template('disabled_first'));
				$btn_replace['main']['previous'] = $this->replace($arr_replace, $this->get_template('disabled_previous'));
			}
			
			if (is_numeric($this->get('limited')) && $this->get('pages') > $this->get('limited')) {
				if ($this->get('limited') % 2) {
					$perside = floor($this->get('limited') / 2);
				} else {
					$perside = ($this->get('limited') / 2) - 1;
				}
				
				if ($this->get('current_page') <=  ($perside + 1)) {
					$start = $this->get('current_page') - (($perside + ($this->get('current_page') - $perside)) - 1);
				} else {
					$start = $this->get('current_page') - $perside;
				}
				
				if (($this->get('pages') - $this->get('current_page')) <= $perside) {
					$end = $this->get('current_page') + ($this->get('pages') - $this->get('current_page'));
				} else {
					$end = $this->get('current_page') + $perside;
				}
			} else {
				$start = 1;
				$end = $this->get('pages');
			}
			
			if ($start > 1) {
				$btn_replace['main']['number'] .= " ... ";
			}
			
			for ($i = $start; $i <= $end; $i++) {
				if ($this->get('current_page') == $i) {
					$arr_replace['current_page'] = array('page' => $i, 'limit' => $this->get('perpage'));
					
					$btn_replace['main']['number'] .= $this->replace($arr_replace, $this->get_template('current_page'));
				} else {
					$arr_replace['number'] = array('page' => $i, 'limit' => $this->get('perpage'));
					
					$btn_replace['main']['number'] .= $this->replace($arr_replace, $this->get_template('number'));
				}
			}
			
			if ($end < $this->get('pages')) {
				$btn_replace['main']['number'] .= " ... ";
			}
			
			if ($this->get('current_page') < $this->get('pages')) {
				$btn_replace['main']['last'] = $this->replace($arr_replace, $this->get_template('last'));
				$btn_replace['main']['next'] = $this->replace($arr_replace, $this->get_template('next'));
			} else {
				$btn_replace['main']['last'] = $this->replace($arr_replace, $this->get_template('disabled_last'));
				$btn_replace['main']['next'] = $this->replace($arr_replace, $this->get_template('disabled_next'));
			}
			
			$btn_replace['main'] = array_merge($btn_replace['main'], $this->data);
			
			$replaced = $this->replace($btn_replace, $this->get_template('main'));
			
			if ($return) {
				return $replaced;
			} else {
				echo $replaced;
			
				return true;
			}
		}
	}
	
	/**
	 * Substitui os atributos por seus valores dentro de um template
	 *
	 * @since 0.6
	 * @param mixed $array Array contendo os elementos, o índice da array deve ser o nome do elemento, se o valor do item for uma array, o mesmo deve conter seus atributos, tendo seus índices com o nome dos atributos
	 * @param string $template Template em que devem ser substituidos os elementos
	 * @return string
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * $first_array['first'] = array('page' => 1, 'limit' => $this->get('interval'));
	 * 
	 * $compiled_first = $this->replace($first_template, $this->get_template('first'));
	 * </code>
	 */
	private function replace($array, $template) {
		$replaced = $template;
		
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				foreach ($value as $subkey => $subvalue) {
					$replaced = str_replace("{". $key .".". $subkey ."}", $subvalue, $replaced);
				}
			} else {
				$replaced = str_replace("{". $key ."}", $value, $replaced);
			}
		}
		
		return $replaced;
	}
	
	/**
	 * Calcula o valor do ponto inicial da busca e a quantidade total de páginas
	 * Ao calcula itens separados eles serão armazenados na classe e retornados
	 * Caso for atribuido all, ele calculará todos os dados e retornará um boolean
	 * 
	 * - 'start':
	 * 		Se o campo $extra for null ele irá calcular o início baseado na página atual
	 * 		Caso contrário $extra deve ser integer contendo a página que deve ser usada no calculo
	 *
	 * @since 0.6
	 * @param string $data_name Nome do dado à ser calculado, pode ser start, end, pages ou all (para calcular todos)
	 * @param string $extra (0.7) Opcional. Este campo contém informações $extras à serem usadas em cada tipo de dado
	 * @return int|bool
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * $total_paginas = $this->calc('pages');
	 * </code>
	 */
	private function calc($data_name, $extra = null) {
		switch ($data_name) {
			case 'all':
			case 'start':
				$page = (is_null($extra)) ? $this->data['current_page'] : $extra;
				
				$start = $this->data['perpage'] * ($page - 1);
				
				$this->set('start', $start);
				
				if ($data_name != 'all') {
					return $start;
				}
			case 'end':
				$end = $this->data['perpage'];
				
				$this->set('end', $end);
				
				if ($data_name != 'all') {
					return $end;
				}
			case 'pages':
				$pages = ceil($this->data['total'] / $this->data['perpage']);
				
				$this->set('pages', $pages);
				
				if ($data_name != 'all') {
					return $pages;
				}
		}
		
		if ($start && $pages) {
			return true;
		} else {
			return false;
		}
	}
}
?>