<?php
/**
		 * 
		 */
		class Pagination
		{
			private $db;
			private $limit;
			private $offset;
			private $total;
			private $pageno;
			function __construct($dbConn, $alimit)
			{
				$this->db = $dbConn;
				$this->limit = $alimit;
				self::config();
				//self::test();
				self::addButtons();
			}



public function Paginate( string $table) 
		{ 

				try {
					$query = $this->db->query("SELECT * FROM ".$table." LIMIT ".$this->limit." OFFSET ".$this->offset." ");
					while ($row = $query->fetch(PDO::FETCH_OBJ)) 
					{
						print_r($row->task); echo '<br>';
					}
				} catch (Exception $e) {
					echo "Error ". $e->getMessage();
				}
		}




//---------------------------------------------------------------------------------------------------------------------------------------------------------------//



			private function addButtons()
			{
			
				?>

		<div class="fixed-bottom">
			<nav aria-label="Пример навигации по страницам">
				  <ul class="pagination">
				    <li class="page-item">
				      <a class="page-link" href="index.php?pageno=<?= $this->pageno-1; ?>" aria-label="Предыдущая">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li class="page-item"><a class="page-link" href="index.php?pageno=1">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="index.php?pageno=<?= $this->total; ?>"><?= $this->total?></a></li>
				    <li class="page-item">
				      <a class="page-link" href="index.php?pageno=<?= $this->pageno+1; ?>" aria-label="Следующая">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
			</nav>
		</div>
				<? 
			}


//---------------------------------------------------------------------------------------------------------------------------------------------------------------//		


		private function config($table = "tasks")
		{
					try {
				$total_query = $this->db->query("SELECT COUNT(*) FROM ".$table."");
				$total_query = $total_query->fetch(PDO::FETCH_ASSOC);
				//echo $_GET['pageno'] . $total_query['COUNT(*)'] . $this->limit;
			} catch (Exception $e) {
				echo "Error ". $e->getMessage();
			}	
			if (!isset($_GET['pageno']) || $_GET['pageno'] == 0) 
			{
				$_GET['pageno'] = 1;

			}
				$this->total = $total_query['COUNT(*)'];
				$this->pageno = $_GET['pageno'];
				$offset = ($_GET['pageno'] * $this->limit)-1;
				$this->offset = $offset;

				// if ($_GET['pageno'] > ($total_query['COUNT(*)'] / $this->limit+1)) 
				// {
				// 	echo '<div class=" container alert alert-danger text-center">There is no content here!</div>';
				// 	//exit(); 
				// }

		}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------//		

		private function test(){
			var_dump($this);
		}
	}
 ?>