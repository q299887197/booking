<?PHP

$pdo = new PDO("mysql:host=localhost;dbname=locktest;port=3306", "root", "");
$pdo->exec("set names utf8");

$msg = '';

if(isset($_POST['doOrder'])){
    
    try{
        
        $pdo->beginTransaction();
        
        $sql="SELECT * FROM product WHERE id = :id FOR UPDATE";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $_POST['productID']);
        $stmt->execute();
        $productData = $stmt->fetch();
        
        sleep(5);
        if($productData['amount'] >= $_POST['buyAmount'] ){
            $sql="UPDATE product SET amount = amount - :buyAmount WHERE id = :id" ; 
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $_POST['productID']);
            $stmt->bindParam(':buyAmount', $_POST['buyAmount'], PDO::PARAM_INT);
            $updateCount = $stmt->execute();
            
            if($updateCount > 0){
                $msg = '訂購成功';
            }else{
                $msg = '訂購失敗';
            }
        }else{
           throw new Exception("購買數量大於庫存數量");
        }
        
        
        
        $pdo->commit();
        
    }catch (Exception $err){
        $pdo->rollBack();
        $msg = $err->getMessage();
    }
        
        
        
}


$sql = "SELECT * FROM product WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

?>

<html>
    <head>
        <meta charset="utf-8">
        <style>
            body{
                font-size: 20px;
            }
            input[type=submit]{
                width: 100%;
                color: white;
                background: black;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <form method="POST">
            <br>
            <br>
            <br><br>
            <div style="width: 300px; margin: 0 auto">
                <div>產品名稱：<?=$result['name']?></div>
                <div>產品單價：<?=$result['price']?></div>
                <div>剩餘數量：<?=$result['amount']?></div>
                <div>訂購數量：<input value="" type="number" name="buyAmount"></div>
                <div>
                    <input name="doOrder" value="下單" type="submit">
                    <input value="<?=$result['id']?>" type="hidden" name="productID">
                </div>
                <br><br><br><br><br><br>
                <div><?= $msg ?></div>
            </div>
        </form>
    </body>
</html>