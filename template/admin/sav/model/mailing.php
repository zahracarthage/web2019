<?PHP

class mailing 
{

	private $id;
	private $sujet;
	private $reponse;
	private $email;


	function __construct( $id,$sujet,$reponse,$email)
				{

	$this->id=$id;
		$this->sujet=$sujet;
		$this->reponse=$reponse;
		$this->email=$email;
	
				}

	function getid(){
		return $this->id;
	}
	function getsujet(){
		return $this->sujet;
	}
	function getreponse(){
		return $this->reponse;
	}
	function getemail()
	{
		return $this->email; 
	}

	function setsujet(){
		return $this->sujet;
	}




}

?>