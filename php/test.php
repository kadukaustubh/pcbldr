$.ajax({
    type: "POST",
    url: 'custom.php',
    data: { name : bldname },
    success: function(data)
    {
       alert("success!");
    }
});

if(isset($_POST['name']))
{
    $uid = $_POST['name'];
}