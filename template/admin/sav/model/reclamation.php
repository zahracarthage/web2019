<?PHP

class reclamation 
{


	private $nom;
	private $prenom;
	private $email;
	private $sujet;
	private $message;
	private $etat; 

	function __construct($id, $nom,$prenom,$email,$sujet,$message,$etat)
				{
			$this->id=$id; 
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->sujet=$sujet;
		$this->message=$message;
		$this->etat=$etat;
				}
	function getid()
	{
		return $this->id;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getemail(){
		return $this->email;
	}
	function getsujet(){
		return $this->sujet;
	}
	function getmessage(){
		return $this->message;
	}
	function getetat()
	{
		return $this->etat;
	}


function setnom($nom)
{
	$this->nom=$nom;
}
	function setprenom($prenom){
		$this->prenom=$prenom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setsujet($sujet){
		$this->sujet=$sujet;
	}
	function setmessage($message){
		$this->message=$message;
	}
	function setetat($etat)
	{
		$this->etat=$etat;
	}

}

?>