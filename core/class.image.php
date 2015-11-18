<?php
/**
 * Classe para manipulação de imagens através da Biblioteca GD
 * 
 * Log:
 * 
 * (2.4.0) 01/04/2008
 * 		- Foi incluida a função {@link slice()}, que permite recortar uma parte da imagem
 * 		- Corrigido um bug com o parâmetro $filename do método imagegif quando o valor é null
 * 
 * (2.3.1) 01/04/2008
 * 		- A função {@link draw()} foi modificada, agora ela não atribui a extensão ao arquivo, sendo então definido pelo usuário
 * 		- Ao requisitar a extensão de uma imagem JPEG, não será mais retornado .jpeg, e sim .jpg
 * 
 * (2.3) 31/03/2008
 * 		- A função {@link draw()} foi modificada, adicionando-se o parâmentro $filename e dando a possibilidade de salvar a imagem em uma pasta
 * 
 * Atualmente Suporta os seguintes tipos de imagem:
 * 		- JPG/JPEG (2.0)
 * 		- GIF (2.0)
 * 		- PNG (2.0)
 * 
 * @author Fernando Marquardt <fernando.marquardt@gmail.com>
 * @version 2.4.0
 * @package Image
 * 
 * @todo Incluir suporte à outros tipos de imagem
 * @todo Incluir possibilidade de usar uma cor de fundo na imagem redimensionada
 * @todo Resolver o problema no uso combinado de {@link add_string()} e {@link resize()}. Onde a string acaba sendo redimensionada junto com o resto da imagem
 * @todo Melhorar o uso de Strings na Classe, dando a possibilidade de utilizar fontes maiores e fontes em True Type 
 *
 */

class Image {
	/**
	 * Armazena o endereço original da imagem carregada
	 *
	 * @var string
	 */
	private $src = null;
	/**
	 * Armazena o image source da imagem carregada
	 *
	 * @var resource
	 */
	private $image = null;
	
	/**
	 * Construtor da Classe
	 *
	 * <b>Exemplo:</b>
	 * <code>
	 * $img = new Image("./imagens/imagem.jpg");
	 * </code>
	 * @param string $src Caminho ou URL onde se encontra a imagem à ser carregada
	 * @return Image
	 */
	public function Image($src) {
		$this->src = $src;
		
		$this->load_image();
	}
	
	/**
	 * Carrega uma imagem para dentro da classe
	 *
	 * @since 2.0
	 * @param string $src Opcional. Caminho ou URL onde se encontra a imagem à ser carregada
	 * @return boolean
	 */
	public function load_image($src = null) {
		if (is_null($src)) {
			$src = $this->src;
		}
		
		$error = false;
		
		switch ($this->get_info('imagetype')) {
			case IMAGETYPE_GIF:
				if (!($image = @imagecreatefromgif($src))) {
					trigger_error('Image Class: A versão da Biblioteca GD não possui suporte à GIF', E_USER_NOTICE);
					
					$error = true;
				}
				break;
			case IMAGETYPE_JPEG:
				if (!($image = @imagecreatefromjpeg($src))) {
					$error = true;
				}
				break;
			case IMAGETYPE_PNG:
				if (!($image = @imagecreatefrompng($src))) {
					$error = true;
				}
				break;
		}
		
		if ($error) {
			trigger_error('Image Class: Ocorreu um erro na tentativa de criar a imagem', E_USER_WARNING);
			
			return false;
		} else {
			$this->image = $image;
			return true;
		}
	}
	
	/**
	 * Pega as informações da imagem
	 * 
	 * Atualmente as informações que podem ser requisitadas são:
	 * 		- width (2.0)
	 * 		- height (2.0)
	 * 		- imagetype (2.0)
	 * 		- mimetype (2.0)
	 * 		- extension (2.0)
	 *
	 * <b>Exemplo:</b>
	 * <code>
	 * $img_width = $img->get_info("extension"); // Retorna .jpeg
	 * </code>
	 * @since 2.0
	 * @param string $info_name Nome da informação à ser requisitada
	 * @return int|string|boolean
	 */
	public function get_info($info_name) {
		if ($info = getimagesize($this->src)) {
		
			switch ($info_name) {
				case 'width':
					$return = $info[0];
					break;
				case 'height':
					$return = $info[1];
					break;
				case 'imagetype':
					$return = $info[2];
					break;
				case 'mimetype':
					if (isset($info['mime'])) {
						$return = $info['mime'];
					} else {
						$return = image_type_to_mime_type($this->get_info('imagetype'));
					}
					break;
				case 'extension':
					$return = image_type_to_extension($this->get_info('imagetype'));
					$return = strtolower($return);
					
					if ($return == ".jpeg") {
						$return = ".jpg";
					}
					
					break;
			}
		} else {
			trigger_error("Image Class: Não foi possível obter a informação '". $info_name ."' da imagem", E_USER_WARNING);
			
			$return = false;
		}
		
		return $return;
	}

	/**
	 * Redimensiona a imagem
	 * 
	 * Os tipos de proporção:
	 * 		- width (2.0):
	 * 			Calcula o novo height proporcionalmente ao novo width
	 * 		- height (2.0):
	 * 			Calcula o novo width proporcionalmente ao novo height
	 * 		- both (2.0):
	 * 			Calcula as duas dimensões proporcionalmente uma à outra
	 * 			e depois verifica se alguma das duas novas dimensões ficou maior que
	 * 			as dimensões passadas por parâmetro. Se estiver maior, ele redimensiona
	 * 			a imagem até ficar dentro das novas dimensões
	 * 		- taxa de modificação (ex.: 0.3 = 30%) (2.0):
	 * 			Neste caso você deve usar a seguinte sintaxe: < (menor) ou > (maior) junto com a taxa
	 * 			ex.: >0.5 (aumenta 50%), <0.3 (diminui 30%)
	 *
	 * <b>Exemplo 1:</b>
	 * <code>
	 * $img->resize(200, 0, 'width'); // Irá calcular uma nova altura proporcionalmente à nova largura
	 * </code>
	 * 
	 * <b>Exemplo 2:</b>
	 * <code>
	 * $img->resize(200, 300, 'both'); // Irá calcular largura e altura proporcionais de forma que ambos fiquem menores que os valores
	 * </code>
	 * 
	 * <b>Exemplo 3:</b>
	 * <code>
	 * $img->resize(0, 0, '>0.75'); // Irá aumentar a imagem em 75% do seu tamanho
	 * </code>
	 * @since 2.0
	 * @param int $new_width
	 * @param int $new_height
	 * @param string $proportional
	 */
	public function resize($new_width, $new_height, $proportional = null) {
		$width = $this->get_info('width');
		$height = $this->get_info('height');
		
		if (!is_null($proportional)) {
			switch ($proportional) {
				case 'width':
					$diff = $new_width - $width;
					$rate = $diff / $width;
					
					$new_height = round($height + ($height * $rate));
					break;
				case 'height':
					$diff = $new_height - $height;
					$rate = $diff / $height;
					
					$new_width = round($width + ($width * $rate));
					break;
				case 'both':
					$diff_width = $new_width - $width;
					$rate_width = $diff_width / $width;
					
					$tmp_height = round($height +($height * $rate_width));
					
					$diff_height = $new_height - $height;
					$rate_height = $diff_height / $height;
					
					$tmp_width = round($width + ($width * $rate_height));
					
					if ($tmp_height <= $new_height) {
						$new_height = $tmp_height;
					}
					
					if ($tmp_width <= $new_width) {
						$new_width = $tmp_width;
					}
					break;
				default:
					$act = substr($proportional, 0, 1);
					$rate = substr($proportional, 1);
					
					if ($act == ">") {
						$new_width = round($width + ($width * $rate));
						$new_height = round($height + ($height * $rate));
					} elseif ($act == "<") {
						$new_width = round($width - ($width * $rate));
						$new_height = round($height - ($height * $rate));
					} else {
						trigger_error('Image Class: Informe o tipo de proporcionalidade que deseja', E_USER_WARNING);
					}
			}
		}
		
		$resized = @imagecreatetruecolor($new_width, $new_height);
		
		@imagecopyresized($resized, $this->image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		
		$this->image = $resized;
	}

	/**
	 * Recorta uma parte da imagem
	 *
	 * <b>Exemplo:</b>
	 * <code>
	 * $img->slice(100, 80, 350, 250); // Irá recortar um pedeço da imagem com dimensões 350x250 a partir do ponto 100,80
	 * </code>
	 * 
	 * @since 2.4.0
	 * @param int $x Posição horizontal de onde deve iniciar o corte
	 * @param int $y Posição vertical de onde deve iniciar o corte
	 * @param int $width Largura da imagem recortada
	 * @param int $height Altura da imagem recortada
	 */
	public function slice($x, $y, $width, $height) {
		$slice = @imagecreatetruecolor($width, $height);
		
		@imagecopy($slice, $this->image, 0, 0, $x, $y, $width, $height);
		
		$this->image = $slice;
	}
	
	/**
	 * Imprime a imagem na tela, ou salva em um diretório
	 * 
	 * Observação: Essa função deve ser chamada antes do envio de qualquer Header e não deve haver nenhuma saída de buffer (html, textos, etc...) quando esta função foi chamada
	 *
	 * <b>Exemplo:</b>
	 * <code>
	 * $img->draw(IMAGETYPE_GIF); // Irá imprimir o buffer da imagem com sua respectiva header convertida em GIF
	 * </code>
	 * 
	 * <b>Exemplo 2:</b>
	 * <code>
	 * $img->draw('../imagens/casa'. $img->get_info('extension'), IMAGETYPE_JPEG, 90); // Irá salvar a imagem em 'imagens' com o nome de casa.jpg com qualidade 90% (Qualidade disponível apenas para JPEG)
	 * </code>
	 * @since 2.0
	 * @param string $filename (2.3) Opcional. Aponta a pasta em que a imagem deve ser salva
	 * @param int $imagetype Opcional. Tipo da imagem à ser desenhada. Útil para conversão de tipos. Os valores do tipos de imagem são os encontrados nas constantes IMAGETYPE_ (ex.: IMAGETYPE_JPEG)
	 * @param int $quality Opcional. Qualidade da imagem, só é aplicável em imagens do tipo JPEG
	 * @return boolean
	 */
	public function draw($filename = null, $imagetype = null, $quality = 75) {
		if (is_null($imagetype)) {
			$imagetype = $this->get_info('imagetype');
		}
		
		if (is_null($filename)) {
			header('Content-Type: '. $this->get_info('mimetype'));
		}
		
		$error = false;
		
		switch ($imagetype) {
			case IMAGETYPE_JPEG:
				if (!@imagejpeg($this->image, $filename, $quality)) {
					$error = true;
				}
				break;
			case IMAGETYPE_GIF:
				if ($filename) {
					if (!imagegif($this->image, $filename)) {
						$error = true;
					}
				} else {
					if (!imagegif($this->image)) {
						$error = true;
					}
				}
				break;
			case IMAGETYPE_PNG:
				if (!@imagepng($this->image, $filename)) {
					$error = true;
				}
				break;
		}
		
		if ($error) {
			trigger_error('Image Class: Não foi possível desenhar a figura');
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Adiciona uma string à imagem nas coordenadas designadas
	 * Quando a string for impressa na vertical, a mesma começara de baixo para cima
	 *
	 * Observação: Se forem adicionadas strings à imagem antes de ser redimensionada, as mesmas serão redimensionadas com a imagem
	 * 
	 * <b>Exemplo:</b>
	 * <code>
	 * // Imprime a string na imagem na vertical com fundo branco. Ela será impressa no canto superior esquerdo
	 * $img->add_string('Texto da Imagem', 0, 0, 'right', 'v', 5, array(0, 0, 0), array(255, 255, 255));
	 * </code>
	 * @since 2.0
	 * @param string $string A string que será impressa na imagem
	 * @param int $x Posição horizontal onde a string será impressa
	 * @param int $y Posição vertical onde a string será impressa
	 * @param string $align (2.2) Indica a partir de que lado deve começar a escrever, os valores válidos são: left, center e right
	 * @param string $direction (2.1) Indica em qual direção deve ser escrita a string, os valores válidos são: h e v
	 * @param int $size Tamanho da fonte, pode ser de 0 à 5
	 * @param mixed $color Cor da string, deve ser uma array contendo a cor em formato RGB array(255,255,255) = Branco
	 * @param mixed $bg_color (2.2) O mesmo que {@link $color}
	 * @return bool
	 */
	public function add_string($string, $x, $y, $align = 'left', $direction = "h", $size = 0, $color = array(0, 0, 0), $bg_color = null) {
		$img_width = $this->get_info('width');
		$img_height = $this->get_info('height');
		
		$color = @imagecolorallocate($this->image, $color[0], $color[1], $color[2]);
		
		if ($size < 0 || $size > 5) {
			$size = 0;
		}
		
		$pix_size[0] = array(5, 6);
		$pix_size[1] = array(5, 6);
		$pix_size[2] = array(6, 12);
		$pix_size[3] = array(7, 12);
		$pix_size[4] = array(8, 16);
		$pix_size[5] = array(9, 16);
		
		$str_width = ceil(strlen($string) * $pix_size[$size][0]);
		$str_height = $pix_size[$size][1] + 2;
		
		switch(strtolower($direction)) {
			case "h":
				switch ($align) {
					case 'left':
						// Tudo fica igual
						break;
					case 'center':
						$x = ceil($x - ($str_width / 2));
						break;
					case 'right':
						$x = ceil($x - $str_width);
						break;
				}
				
				if (is_null($bg_color)) {
					@imagestring($this->image, $size, $x, $y, $string, $color);
				} else {
					$str_img = @imagecreate($str_width, $str_height);
					
					$color = @imagecolorallocate($str_img, $color[0], $color[1], $color[2]);
					$bg_color = @imagecolorallocate($str_img, $bg_color[0], $bg_color[1], $bg_color[2]);
					
					@imagefill($str_img, 0, 0, $bg_color);
					
					@imagestring($str_img, $size, 0, 0, $string, $color);
					
					@imagecopymerge($this->image, $str_img, $x, $y, 0, 0, $str_width, $str_height, 100);
				}
				
				return true;
				break;
			case "v":
				switch ($align) {
					case 'left':
						// Tudo fica igual
						break;
					case 'center':
						$y = ceil($y + ($str_width / 2));
						break;
					case 'right':
						$y = ceil($y + $str_width + 4);
						break;
				}
				
				if (is_null($bg_color)) {
					@imagestringup($this->image, $size, $x, $y, $string, $color);
				} else {
					$str_img = @imagecreate($str_height, $str_width + 4);
					
					$color = @imagecolorallocate($str_img, $color[0], $color[1], $color[2]);
					$bg_color = @imagecolorallocate($str_img, $bg_color[0], $bg_color[1], $bg_color[2]);
					
					@imagefill($str_img, 0, 0, $bg_color);
					
					@imagestringup($str_img, $size, 0, $str_width, $string, $color);
					
					@imagecopymerge($this->image, $str_img, $x, ($y - $str_width - 4), 0, 0, $str_height, $str_width + 4, 100);
				}
				
				return true;
				break;
			default:
				trigger_error('Image Class: Diração da imagem inválido');
				return false;
		}
	}

	/**
	 * Verifica o suporte aos IMAGETYPES
	 *
	 * <b>Exemplo:</b>
	 * <code>
	 * if ($img->support(IMAGETYPE_GIF)) {
	 * 		echo "Possui suporte à GIF!";
	 * } else {
	 * 		echo "Não possui suporte a GIF!";
	 * }
	 * </code>
	 * @param int $imagetype O tipo de imagem do formato desejado, podem ser usadas as constantes IMAGETYPE_ (ex.: IMAGETYPE_JPEG)
	 * @return boolean
	 */
	public function support($imagetype) {
		$gd = gd_info();		
		
		switch ($imagetype) {
			case IMAGETYPE_GIF:
				if (imagetypes() & IMG_GIF) {
					$return = true;
				} else {
					$return = false;
				}
				break;
			case IMAGETYPE_JPEG:
				if (imagetypes() & IMG_JPG) {
					$return = true;
				} else {
					$return = false;
				}
				break;
			case IMAGETYPE_PNG:
				if (imagetypes() & IMG_PNG) {
					$return = true;
				} else {
					$return = false;
				}
				break;
		}
		
		return $return;
	}
}
?>