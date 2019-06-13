<html>
 <head>
  <title>Duy's Simple Website</title>
  <?php echo '<h1 style="color: red; text-align: center">Hello <3 Welcome to my Website</h1>'
  ?>
  <?php echo '<h2 style="color: blue; text-align: center">Thank you for coming here ! </h2>'
  ?>
 </head>
  <style>
    .picture {
        float: left;
        border-style: : solid;
        border-width: 1px;
        border-color: silver;
     }

    .clickdata {
        float: left;
        margin-left: 20px;
        margin-top: 200px;
     }
    .clickdata input[type="submit"] {
        font-size: 0.9em;
        color: #fff;
        background-color: #403b37;
        border: none;
        padding: 2px;
        width: 200%;
        outline: none;
        text-align: center;
    }
    .clickdata input[type="submit"]:hover {
        background: #FF00CC;
    }
    </style>
 <body>
    <div class=title style="width: 280px; height: 25px; background: pink; margin-top: 100px; margin-left: 500px ">
        <ul>
            <li>
                <span style="color: white"> <a href="https://www.facebook.com/duy123prodn" target="_blank" >Link to my facebook</a> </span>
            </li>
        </ul>
    </div >
<div class=picture>
    <img src="duy.jpg">
</div>
<div class=clickdata>
     <a href="https://vnexpress.net/" target="_blank" >Đọc báo trên VnExpress Thì Nhấn Vào Đây</a>
     <br/>
     <p>===============================================</p>
     <a href="https://www.24h.com.vn/" target="_blank" >Đọc báo ở trang 24h thì nhấn vào đây</a>
     <br/>
     <p>===============================================</p>
     <a href="ConnectToDB.php" target="_blank" >Connect to Database: CLICK HERE</a>
     <br/>
     <p>===============================================</p>
     <a href="InsertData.php" target="_blank" >Provide me your Information. Thank you <3 </a>
     <br/>
     <p>===============================================</p>
     <a href="UpdateData.php" target="_blank" >Update Data</a>
     <br/>
     <p>===============================================</p>
     <a href="DeleteData.php" target="_blank" >Delete Data</a> 
</div>
 </body>
</html>