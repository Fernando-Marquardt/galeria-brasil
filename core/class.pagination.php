<?php
/**
 * Classe para cria��o de pagina��o
 * 
 * Log:
 * 
 * Vers�o 0.8.1 - 23/07/2008
 * 		- Corrigida inconscist�ncia no m�todo {@link get()}, que fazia com que o mesmo retornasse valores incorretos
 * 
 * Vers�o 0.8.0 - 09/06/2008
 * 		- O m�todo {@link set_template()} agora recebe apenas um par�metro, sendo uma array contendo os templates
 * 
 * Vers�o 0.7.0 - 03/04/2008
 * 		- Foi acrescentado o par�metro $extra � fun��o {@link calc}
 * 
 * @author Fernando Marquardt <fernando.marquardt@gmail.com>
 * @version 0.8.1
 * @package Pagination
**/

class Pagination {
	/**
	 * Armazena todas as informa��es da classe
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
	 * @param int $total N�mero total de itens/registros
	 * @param int $current_page P�gina atual
	 * @param int $perpage Quantidade de itens por p�gina
	 * @param bool|int $limited Se for um valor num�rico, limitar� a quantiade de p�ginas n�mericas que podem ser visualizadas
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
	 * @param any $data_value Valor � ser atribuido
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
	 * echo "Mostrado de ". $pages->get('start') ." � ". ($pages->get('start') + $pages->get('perpage')); // Mostrando de 20 � 29
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
	 * Atribui templates aos elementos da classe. Todos os elementos, com exce��o do elementos disabled e o main, possuem os atributos page, start e limit
	 * Estes elementos e seus atributos podem ser chamados dentro do template, como por exemplo: {next.page}.
	 * Nesse caso a string ser� substituida pelo n�mero da pr�xima p�gina
	 * 
	 * O elemento main possui os atributos referentes aos bot�es, que s�o: first, last, previous, next e number
	 * E tamb�m os valores contidos em {@link $data}
	 * 
	 * As templates devem ser atribuidas aos elementos, pois eles n�o possuem template padr�o
	 * 
	 * Os elementos s�o:
	 * 		- first 		(0.6): Primeira p�gina
	 * 		- last 			(0.6): �ltima p�gina
	 * 		- previous		(0.6): P�gina anterior
	 * 		- next			(0.6): Pr�xima p�gina
	 * 		- number		(0.6): P�ginas num�ricas
	 * 		- current_page 	(0.6): P�gina atual
	 * 		- main			(0.6): Representa toda a pagina��o
	 * 
	 * H� tamb�m os templates que representam os elementos desabilitadoos:
	 * 		- disabled_first	(0.6): Primeira p�gina desabilitada
	 * 		- disabled_last		(0.6): �ltima p�gina desabilitada
	 * 		- disabled_previous	(0.6): P�gina anterior desabilitada
	 * 		- disabled_next		(0.6): Pr�xima p�gina desabilitada
	 *
	 * @since 0.6
	 * @param mixed $elements (0.8) Array contendo os templates dos elementos, o �ndice de cada registro deve ser o nome do elemento
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
	 * Renderiza a pagina��o
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
	 * @param mixed $array Array contendo os elementos, o �ndice da array deve ser o nome do elemento, se o valor do item for uma array, o mesmo deve conter seus atributos, tendo seus �ndices com o nome dos atributos
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
	 * Calcula o valor do ponto inicial da busca e a quantidade total de p�ginas
	 * Ao calcula itens separados eles ser�o armazenados na classe e retornados
	 * Caso for atribuido all, ele calcular� todos os dados e retornar� um boolean
	 * 
	 * - 'start':
	 * 		Se o campo $extra for null ele ir� calcular o in�cio baseado na p�gina atual
	 * 		Caso contr�rio $extra deve ser integer contendo a p�gina que deve ser usada no calculo
	 *
	 * @since 0.6
	 * @param string $data_name Nome do dado � ser calculado, pode ser start, end, pages ou all (para calcular todos)
	 * @param string $extra (0.7) Opcional. Este campo cont�m informa��es $extras � serem usadas em cada tipo de dado
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