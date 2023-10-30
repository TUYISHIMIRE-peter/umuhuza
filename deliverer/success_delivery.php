<?php
    if(isset($_GET['transId'])) {
        include 'includes/session.php';
        try {
            $stmt = $conn->prepare("UPDATE delivery SET status = :st WHERE transactionId = :trans");
            $stmt->execute([':st'=>1, ':trans'=>$_GET['transId']]);
            $stmt = $conn->prepare("UPDATE sales SET status = :st WHERE transactionId = :trans");
            $stmt->execute([':st'=>1, ':trans'=>$_GET['transId']]);
            $_SESSION['success'] =  "Transaction: ".$_GET["transId"]." <br><br> You successfully deliver the package!";
        }
        catch(PDOException $e) {
            $_SESSION['error'] =  "Transaction: ".$_GET["transId"]." <br><br> delivery process failed!";
        }
    }
?>