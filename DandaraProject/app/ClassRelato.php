<?php 

namespace App;

use App\ClassConexao;

class ClassRelato extends ClassConexao {

	private $nome;

	private $relato;

	private $latitude;

	private $longitude;

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getRelato() {
		return $this->relato;
	}

	public function setRelato($relato) {
		$this->relato = $relato;
	}

	public function getLatitude() {
		return $this->latitude;
	}

	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}

	public function getLongitude() {
		return $this->longitude;
	}

	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}

	public function relatar() {
		$con = $this->conectar();
		$dados = $con->prepare("INSERT INTO relatos(nome, relato, latitude, longitude) VALUES(:nome, :relato, :latitude, :longitude)");
		$dados->bindParam(":nome", $this->nome, \PDO::PARAM_STR);
		$dados->bindParam(":relato", $this->relato, \PDO::PARAM_STR);
		$dados->bindParam(":latitude", $this->latitude, \PDO::PARAM_STR);
		$dados->bindParam(":longitude", $this->longitude, \PDO::PARAM_STR);
		$dados->execute();

		echo $this->latitude;

		echo $this->longitude;

	}



}