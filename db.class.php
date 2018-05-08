<?php
	/**
	 * 
	 */
	class db{
		
		private $host = 'localhost';

		private $usuario = 'root';

		private $senha = '';

		private $database = 'twitter_clone';

		public function conecta_mysql(){

			// conecta no DB
			$connection = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			//informando ao db que a comunicação se dará através desse tipo de escrita
			mysqli_set_charset($connection, 'utf8');


			//erro de conexão
			if(mysqli_connect_errno()){
				echo "Erro ao conectar com o DB MySQL: ".mysqli_connect_errno();

			}

			return $connection;
		}

	}
?>
