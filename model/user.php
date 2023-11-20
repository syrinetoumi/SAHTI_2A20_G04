<?PHP
   class user{
    private  int $id_u;
      private string $nom_u;
      private string $prenom_u;
      private int $cin_u;
      private string $email_u;
      private  string $mdp_u;
      private string $role_u;
      private int $tel_u;
  
      
      
      function __construct($id_u=NULL,$nom_u,$prenom_u,$cin_u,$email_u,$mdp_u,$role_u,$tel_u){
        $this->id_u=$id_u;
         $this->nom_u=$nom_u;
         $this->prenom_u=$prenom_u;
         $this->cin_u=$cin_u;
         $this->email_u=$email_u;
         $this->mdp_u=$mdp_u;
         $this->role_u=$role_u;
         $this->tel_u=$tel_u;
      }
      
     
      public function getnom_u()
      {
          return $this->nom_u;
      }
      public function getprenom_u()
      {
          return $this->prenom_u;
      }   
      public function getcin_u()
      {
          return $this->cin_u;
      }
      public function gettel_u()
      {
          return $this->tel_u;
      }
      public function getemail_u()
      {
          return $this->email_u;
      }
      public function getmdp_u()
      {
          return $this->mdp_u;
      }   
      public function getrole_u()
      {
          return $this->role_u;
      }
    
      public function getid_u()
      {
          return $this->id_u;
      }
      
        function setnom_u(string $nom_u): void{
			$this->nom_u=$nom_u;
		}
		function setprenom_u(string $prenom_u): void{
			$this->prenom_u;
		}
	
		function setemail_u(string $email_u): void{
			$this->email_u=$email_u;
		}
		function setmdp_u(string $mdp_u): void{
			$this->mdp_u=$mdp_u;
		}

        function settel_u(string $tel_u): void{
			$this->tel_u=$tel_u;
		}
        function setrole_u(string $role_u): void{
			$this->role_u=$role_u;
		}
        function setcin_u(string $cin_u): void{
			$this->cin_u=$cin_u;
		}

      
      
   }
   
      
?>