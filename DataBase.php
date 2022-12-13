<?php
require "DataBaseConfig.php";
require "Exercice.php";
require "Programme.php";
require "User.php";
require "ExoPgrm.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;
    protected $port;

    //TODO: addExercice (rajouter une colonne idUser à exercices), deleteExercice, addExoPgrm, deleteExoPgrm, modifyExoPgrm

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
        $this->port = $dbc->port;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename, $this->port);
        mysqli_query($this->connect, "SET character_set_results=utf8");
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where email = '" . $email . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbemail = $row['email'];
            $dbpassword = $row['password'];
            if ($dbemail == $email && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function signUp($table, $username, $email, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $email = $this->prepareData($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->sql =
            "INSERT INTO " . $table . " (username, email, password) VALUES ('" .  $username . "','" . $email . "','" . $password . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function getUser($table, $email)
    {
        $email = $this->prepareData($email);
        $this->sql = "select * from " . $table . " where email = '" . $email ."'";
        if($result = mysqli_query($this->connect, $this->sql)){
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) != 0) {
                $user = new User($row["id"], $row["username"], $row["email"]);
            }
            echo json_encode($user);
            return true;
        }
        return false;
    }

    function getExercices($table)
    {
        $this->sql = "select * from " . $table;
        if($result = mysqli_query($this->connect, $this->sql)){
            $listExo = array();
            while($row = $result->fetch_assoc()){
                $listExo[] = new Exercice($row["id"], $row["nom"], $row["muscle"], $row["description"]);
            }
            echo json_encode($listExo); //flags utiles pour accents : JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            return true;
        }
        return false;
    }

    function getProgrammes($table, $idUser)
    {
        $idUser = $this->prepareData($idUser);
        $this->sql = "select * from " . $table . " where iduser = " . $idUser;
        if($result = mysqli_query($this->connect, $this->sql)){
            $listProgramme = array();
            while ($row = $result->fetch_assoc()){
                $listProgramme[] = new Programme($row["id"], $row["iduser"], $row["nom"]);
            }
            echo json_encode($listProgramme);
            return true;
        }
        return false;
    }

    function addProgramme($table, $idUser, $nom)
    {
        $idUser = $this->prepareData($idUser);
        $nom = $this->prepareData($nom);
        $this->sql = "INSERT INTO " . $table . " (iduser, nom) VALUES (" . $idUser . ",'" . $nom . "')";
        if(mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function deleteProgramme($table, $id)
    {
        $id = $this->prepareData($id);
        $this->sql = "delete from " . $table . " where id = " . $id;
        if(mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function getExoPgrm($table, $idPgrm)
    {
        $idPgrm = $this->prepareData($idPgrm);
        $this->sql = "select * from " . $table . " where idpgrm = " . $idPgrm;
        if($result = mysqli_query($this->connect, $this->sql)){
            $listExoPgrm = array();
            while ($row = $result->fetch_assoc()){
                $listExoPgrm[] = new ExoPgrm($row["id"], $row["idpgrm"], $row["idexo"], $row["nbserie"], $row["nbrep"], $row["tempsrepos"], $row["poids"]);
            }
            echo json_encode($listExoPgrm);
            return true;
        }
        return false;
    }

    function addExoPgrm($table, $idExo, $idPgrm)
    {
        $idExo = $this->prepareData($idExo);
        $idPgrm = $this->prepareData($idPgrm);
        $this->sql = "INSERT INTO $table (idexo, idpgrm) VALUES ($idExo,$idPgrm)";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function deleteExoPgrm($table, $id)
    {
        $id = $this->prepareData($id);
        $this->sql = "delete from " . $table . " where id = " . $id;
        if(mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }
}
