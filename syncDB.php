<?php
include 'servauth.php';
echo "Funciona";
$fechaHora = strtotime(date('H:i'));

  if($fechaHora ==strtotime(date('06:00'))){
                        //echo "<script> alert('Entro al condicional');</script>";
                        bloquearHoras(1);        
                }
                else if($fechaHora ==strtotime(date('07:00'))){
                        // Bloquear clases de 8:30
                        bloquearHoras(2);
                }
                else if($fechaHora ==strtotime(date('08:30'))){
                        // Bloquear clases de 10:00
                        bloquearHoras(3);
                }
                else if($fechaHora ==strtotime(date('10:00'))){
                        // Bloquear clases de 11:30
                        bloquearHoras(4);
                }
                else if($fechaHora ==strtotime(date('11:30'))){
                        // Bloquear clases de 1:00
                        bloquearHoras(5);
                }
                else if($fechaHora ==strtotime(date('13:00'))){
                        // Bloquear clases de 2:30
                        bloquearHoras(6);
                }
                else if($fechaHora ==strtotime(date('14:30'))){
                        // Bloquear clases de 4:00
                        bloquearHoras(7);
                }
                else if($fechaHora ==strtotime(date('16:00'))){
                        // Bloquear clases de 5:30
                        bloquearHoras(8);
                }
                else if($fechaHora ==strtotime(date('17:30'))){
                        // Bloquear clases de 7:00
                }
                else if($fechaHora ==strtotime(date('19:00'))){
                        // Borrar todas los horarios de no disponible
			$fecha = date('Y-m-d');
                        $sql = "DELETE FROM bookings WHERE notes = 'No Disponible'AND date = '$fecha';";
                        $result = mysqli_query($conn, $sql);
                }

                function bloquearHoras($periodo){
			global $conn;
			echo$periodo;
        		$fecha = date('Y-m-d');
        		$sql = "SELECT room_id FROM bookings WHERE period_id='$periodo' AND date = '$fecha';";
		
			$result = mysqli_query($conn, $sql); 
                        
                        $val = array();
                        foreach ($result as $key) {
                                $val[] = $key['room_id'];
                        }

                        for ($i = 1; $i < 6; $i = $i + 1){
                                if (in_array($i, $val)) {

                                }
                                else{
                                        //Insertar en la base de datos horario para bloquear
                                        $sql = "INSERT INTO bookings (school_id,period_id,room_id,date,notes) VALUES (1,'$periodo',$i,'$fecha','No Disponible');";
                                        $result = mysqli_query($conn, $sql);
                                        
                                }       
                		}
  				}

?>
