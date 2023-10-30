<?php
	include 'includes/session.php';

    if(isset($_GET["deliverer"]) && isset($_GET["transId"])) {
        try {
            if(!empty($_GET["deliverer"])) {
                $stmt = $conn->prepare("INSERT INTO delivery(transactionId, userId) VALUES(:Tid, :Uid)");
                $stmt->execute([":Tid"=>$_GET["transId"], ":Uid"=>$_GET["deliverer"]]);
                $_SESSION["success"] = "Transaction: ".$_GET["transId"]." <br><br> Package has been assigned for delivery";
            }
            else {
                $_SESSION["error"] = "Transaction: ".$_GET["transId"]." <br><br> Select package deliverer!";
            }
        }
        catch(PDOException $e) {
            $_SESSION["error"] = "Transaction: ".$_GET["transId"]." <br><br>Package already assigned for delivery";
        }
        //echo "<script>location.href='sales.php';</script>";
    }
    else {
        $output = array('list'=>'');
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        $output["transId"] = $id;

        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT * FROM users WHERE type=:type");
        $stmt->execute(['type'=>3]);

        foreach($stmt as $row){
            $output["list"] .= "
                <option value='".$row['id']."' class='append_items2'>".$row['firstname'].' '.$row['lastname']."</option>
            ";
        }

        $pdo->close();
        echo json_encode($output);
    }
?>