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
            height: 300px;
            width: 100%;
            color: #0000CC;
            background-image: url('bgimage.jpg');
            text-align: center;
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
            .pics{
                height: 300px;
                width: 390px;
                margin: 5px;
                box-shadow: 2px 10px 5px black;
            }
        </style>
    </head>
    
    <body style="margin:0">
        <div class="head1">
            <img class="image" src="wa.jpg" alt="logo" />
            <h2 class="head">Sri Maruti Pharma</h2>
        </div>
        
        <div class="header">
            <table>
                <tr>
                    <td class="zero">
                        <img style="height: 30px; width: 30px;" src="wa.jpg" alt="logo" />
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
        <p style="margin: 0; font-size: 20px; color: #CCCCFF;">We Love to hear it from you on your Query</p>
        
        
        
        <form name="query" method="POST" action="">
            <input type="text" name="name" placeholder="Full Name" class="inp"><br/>
            <input type="text" name="phno" placeholder="Phone Number" class="inp"><br/>
            <input type="text" name="email" placeholder="Email Address" class="inp"><br/>
            <input type="text" name="message" placeholder="Write your Query" style="height: 70px; width: 200px;"><br/><br/>
            <button name="sub" class="button" type="submit">Submit</button>
            
        </form>
        
        <?php
            if(isset($_REQUEST['sub']))
            {
                include "dbconn.php";
                $n=$_POST['name'];
                $p=$_POST['phno'];
                $e=$_POST['email'];
                $m=$_POST['message'];
                if($n=="" or $p=="" or $e=="" or $m=="")
                {
                    echo("Some form Elements are Empty");
                }
                else{
                $query="insert into info(name,phone,email,message) values('$n','$p','$e','$m')";
                $result= mysqli_query($link, $query);
                if(!$result)
                {
                    die("Query was not submitted.". mysqli_connect_error());
                }
                    echo "Query sent succesfully";
            }
            }
        ?>
        </div>
        <div style="background-color: #CCCCFF;">
            <table>
                <tr>
                    <td><img class="pics" src="img1.jpg" alt="image"/></td>
                    <td><img class="pics" src="img2.jpg" alt="image"/></td>
                    <td><img class="pics" src="img3.jpg" alt="image"/></td>
                </tr>
                <tr>
                    <td><img class="pics" src="img4.jpg" alt="image"/></td>
                    <td><img class="pics" src="img5.jpg" alt="image"/></td>
                    <td><img class="pics" src="img6.jpg" alt="image"/></td>
                </tr>
            </table>
        </div>
        <div class="header">
            <table>
                <tr>
                    <td>
                        <img src="whatsapp.png" height="50" width="50"/>
                    </td>
                    <td>
                        <p class="foo">Contact us:914587885 Chat with us, and get a quotation as soon as possible</p>
                    </td>
            </table>
        </div>
        <footer class="header">
            <br/>
            <br/>
            <table>
                <tr>
                    <td class="one"><img height="50" width="50" src="wa.jpg" alt="logo"/></td>
                    <td class="one"><p class="foo">Contact us:9999999999</p></td>
                    <td class="one"><p class="foo">Mail us on:maruthipharma@gmail.com</p></td>
                </tr>
            </table>
        </footer>
    </body>
</html>
