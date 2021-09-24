<!DOCTYPE HTML>
<html>
    <head>
        <title>Sri Maruti Pharma</title>
        <meta charset="UTF-8">
        <style>
            .head1{
                text-align: center; 
                background-color: #CCCCFF;
            }
            .header{
            background-color: black;
            vertical-align: top;
            }
            .head{
            color: #000099;
            margin: 0;
            font-weight: bold;
            }
            .image{
                height: 40px; 
                width: 40px;
            }
            td.one,td.three,td.two{
                width:150px;
            }
            td.zero{
                width: 750px;
            }
            .c{
                color: white;
                background-color: black;
            }
            .foo{
                color: #0000CC;
                font-size: medium;
            }
            .des{
            height: 600px;
            width: 100%;
            color: #0000CC;
            background-image: url('bgimage.jpg');
            background-size: 1500px 1000px;
            }
            .des1{
                color: #CCCCFF;
                width: 600px;
                font-size: 28px;
            }
            .button {
                background-color: #0000CC;
                border: solid;
                color: white;
                padding: 5px 15px;
                text-align: center;
                text-decoration: underline;
                font-size: 16px;
            }
            .inp{
                height: 25px;
                width: 200px;
            }
            .table{
                height: 60px;
                width: 800px;
                color: #CCCCFF;
                font-size: 20px;
            }
        </style>
    </head>
    
    <body style="margin:0">
        <div class="head1">
            <img class="image" src="logo1.jpg" alt="logo" />
            <h2 class="head">Sri Maruti Pharma</h2>
        </div>
        
        <div class="header">
            <table>
                <tr>
                    <td class="zero">
                        <img style="height: 30px; width: 30px;" src="logo1.jpg" alt="logo" />
                    </td>
                    <td class="one">
                        <a class="c" href="index.html">HOME</a>
                    </td>
                    <td class="two">
                        <a class="c" href="contact.php">CONTACT</a>
                    </td>
                    <td class="three">
                        <a class="c" href="about.html">ABOUT US</a>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="des">

        <form name="viewers" method="POST" action="">
            <table>
                <tr><td><select name="field" class="inp">
                <option>name</option>
                <option>email</option>
                <option>phone</option>
                </select></td>
                <td><input type="text" name="search" placeholder="Enter" class="inp"></td>
                <td><button name="sub" class="button" type="submit">Search</button></td>
                <td><button name="all" class="button" type="submit">Display all</button></td>
                <td><button name="sort" class="button" type="submit">Sort</button></td>
               
            </table>
        </form><br/>
            <a href="contact.php" style="color: #CCCCFF;">New Query</a>
            <br/><br/>
        <table class="table" border="1">
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Query</th>
                <th>Delete</th>
            </tr>
        
        <?php
        include "dbconn.php";
        if(isset($_REQUEST['sub']))
        {
                $f=$_POST['field'];
                $s=$_POST['search'];
                if($f=='name'){
                $query="select * from info where name='$s'";}
                else if($f=='email'){
                $query="select * from info where email='$s'";}
                else{
                $query="select * from info where phone='$s'";}
                $result= mysqli_query($link, $query);
                while($row= mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['message'];?></td>
                <td><a href="view.php?r=<?php echo $row['id'];?>" onclick="return confirm('WANT TO DELETE THIS QUERY?');"/>DELETE</a></td>
            </tr>
            <?php
                }
            }
            else if(isset ($_REQUEST['sort']))
            {
                $query="select * from info order by name";
                $result= mysqli_query($link, $query);
                while($row= mysqli_fetch_assoc($result)){   
            ?>
            <tr>
                <td> <?php echo $row['name']; ?></td>
                <td> <?php echo $row['phone']; ?></td>
                <td> <?php echo $row['email']; ?></td>
                <td> <?php echo $row['message']; ?></td>
                <td> <a href="view.php?r=<?php echo $row['id'];?>" onclick="return confirm('WANT TO DELETE THIS QUERY?');"/>DELETE</a></td>
            </tr>
       
            <?php
            }
            }
            else if(isset($_REQUEST['all'])){
            $query="select * from info";
            $result= mysqli_query($link, $query);
            while($row= mysqli_fetch_assoc($result)){
                
                
           ?>
            <tr>
                <td> <?php echo $row['name']; ?></td>
                <td> <?php echo $row['phone']; ?></td>
                <td> <?php echo $row['email']; ?></td>
                <td> <?php echo $row['message']; ?></td>
                <td> <a href="view.php?r=<?php echo $row['id'];?>" onclick="return confirm('WANT TO DELETE THIS QUERY?');"/>DELETE</a></td>
            </tr>
       
            <?php
            }
            }
            else{
            $query="select * from info";
            $result= mysqli_query($link, $query);
            while($row= mysqli_fetch_assoc($result)){     
           ?>
            <tr>
                <td> <?php echo $row['name']; ?></td>
                <td> <?php echo $row['phone']; ?></td>
                <td> <?php echo $row['email']; ?></td>
                <td> <?php echo $row['message']; ?></td>
                <td> <a href="view.php?r=<?php echo $row['id'];?>" onclick="return confirm('WANT TO DELETE THIS QUERY?');"/>DELETE</a></td>
            </tr>
       
            <?php
            }
            }
            ?>
             </table>
            <?php
                if(isset($_GET['r'])){
                    $query="delete from info where id='{$_GET['r']}'";
                    $result= mysqli_query($link, $query);
                    if(mysqli_affected_rows($link)>0){
                    header: "location:view.php";
                    
                    }else{
                        echo "<script> alert'Error in deleting the query' </script>";
                    }
                }
            ?>
        </div>
        
        <footer class="header">
            <br/>
            <br/>
            <table>
                <tr>
                    <td class="one"><img height="50" width="50" src="logo1.jpg" alt="logo"/></td>
                    <td class="one"><p class="foo">Contact us:9999999999</p></td>
                    <td class="one"><p class="foo">Mail us on:maruthipharma@gmail.com</p></td>
                </tr>
            </table>
        </footer>
    </body>
</html>
