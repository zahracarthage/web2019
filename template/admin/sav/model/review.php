<?PHP

class review 
{


	private $nom;
	private $email;
	private $review;
	private $rating;
	private $etat; 
	private $id; 

	function __construct($id,$nom,$email,$review,$rating,$etat)
				{
		$this->nom=$nom;
		$this->email=$email;
		$this->review=$review;
		$this->rating=$rating;
		$this->etat=$etat; 
		$this->id=$id;
		
				}
	
	function getid(){
		return $this->id; 
	}
	function getnom(){
		return $this->nom;
	}

	function getemail(){
		return $this->email;
	}
	function getreview(){
		return $this->review;
	}
	function getrating(){
		return $this->rating;
	}
	function getetat(){
		return $this->etat; 
	}

	function setetat()
	{
		return $this->etat; 
	}


	
}

?>