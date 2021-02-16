<? 

class DB {
	
	private $link;
	
	public function __construct()
	{
		try{
			$this->connect();
		}	
		catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	private function connect()
	{
		$config = require_once($_SERVER['DOCUMENT_ROOT'].'/class/db_config.php');
		$dsn = "mysql:host=".$config['host'].";dbname=".$config['db'].";charset=".$config['charset'];
		$options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION #PDO::ERRMODE_WARNING,
			#PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT 
		);
		# Создаем новый экземпляр PDO
		$this->link = new PDO($dsn, $config['user'], $config['pass'],$options);
		$this->link->exec('SET NAMES utf8');							# Устанавливаем для БД кодировку UTF-8
		return false;
	}
	
	# Подготавливаем запрос
	
	public function prepare($sql){
		return $this->link->prepare($sql); 
	}
	
	
	# Получаем ассоциативный массив
	
	public function getRows($sql,$params = []){
		if (!$params) {
			$stmt = $this->link->query($sql);
		}else {
			$stmt = $this->prepare($sql);
			$stmt->execute($params);
		}
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	# INSERT
	
	public function add($sql,$params = []){
		if (!$params) {
			$stmt = $this->link->query($sql);
		}else{
			$stmt = $this->prepare($sql);
			$stmt->execute($params);
		}
	}
	
	# UPDATE
	
	public function update($sql,$params = []){
		if (!$params) {
			$stmt = $this->link->query($sql);
		}else{
			$stmt = $this->prepare($sql);
			$stmt->execute($params);
		}
	}
	
	
	public function lastInsertId() {
		$sth = $this->link->lastInsertId();
		return $sth;
	}
	

}

?>