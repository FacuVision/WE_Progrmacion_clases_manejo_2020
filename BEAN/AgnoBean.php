<?php 


class AgnoBean{

    private $id_agno;
    private $agno;

	public function getId_agno(){
		return $this->id_agno;
	}

	public function setId_agno($id_agno){
		$this->id_agno = $id_agno;
	}

	public function getAgno(){
		return $this->agno;
	}

	public function setAgno($agno){
		$this->agno = $agno;
	}

}

