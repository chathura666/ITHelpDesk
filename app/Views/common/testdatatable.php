<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

  
    <title>BOC - Firewall Request Management</title>
    <link href="<?php echo base_url('js/datatables/datatables.min.css'); ?>" rel="stylesheet">

    

</head>

<body>

<div class="content-body">
    <div class="container-fluid mt-3"> 
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </tbody>
    </table>
    </div>
</div>


<script src="<?php echo base_url('js/datatables/datatables.min.js'); ?>"></script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>

</body>

</html>
