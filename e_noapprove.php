<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ไม่อนุมัติ</title>
</head>
<?php include('navbar/exebar.php'); ?>
<style>
    .main {
        margin-left: 150px;
        width: 100%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    #myTable {
        border-collapse: collapse;
        /* Collapse borders */
        width: 100%;
        /* Full-width */
        border: 1px solid #ddd;
        /* Add a grey border */
        font-size: 18px;
        /* Increase font-size */
        background-color: #FFFFFF;
    }


    #myTable td {
        text-align: center;
        /* Left-align text */
        padding: 12px;
        /* Add padding */
    }

    #myTable tr {
        /* Add a bottom border to all table rows */
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header {
        background-color: #BFE6FF;
    }

    #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #d9d9d9;
    }
</style>

<body>
    <div class="container">
        <div class="main">
            <center>
                <br><br>
               
            <table id="myTable">
                <tr class="header">
                    <th align="left">การอนุมัติ</th>
                    <th></th>
                </tr>
                <tr>
                    <td width="50%"><textarea name="message" rows="10" cols="50">ข้อเสนอแนะ</textarea><br></td>
                    <td><input type="file" name="img" class="form-control" placeholder="รูปภาพ" accept="image/*" required></td><br>
                    
                </tr>

            </table>
            <br><br>
            <a href="e_history.php"><input type="submit" name="save" value="save"></a>
            <a href="e_approve.php"><input type="submit" name="cancle" value="cancle"></a>
            </center>
        </div>
    </div>
</body>

</html>