<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="maildetails";
$conn = mysqli_connect($servername, $username, $password,$db);
?>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<link href="grapesjs-dev/dist/css/grapes.min.css" rel="stylesheet" />
<link href="grapesjs-preset-newsletter-master/dist/grapesjs-preset-newsletter.css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="grapesjs-dev/dist/grapes.min.js"></script>
<script src="grapesjs-preset-newsletter-master/dist/grapesjs-preset-newsletter.min.js"></script>

<div id="gjs"></div>
<br/><br/><br/>
<input type="cancel" class="btn btn-primary" style="margin-top: -50px;width: 7%;margin-left: 77%;" onclick="Createclick()" value="Create">

<table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>SL NO</th>
                        <th>MailHTML</th>
                        <th>MailCSS</th>
						<th>MailStyle</th>
                        <th>Modify</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM mailformat");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["ID"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["ID"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["MailHTML"]; ?></td>
					<td><?php echo $row["MailCSS"]; ?></td>
					<td><?php echo $row["MailStyle"]; ?></td>
				
					<td>
					<a id="editform"  onclick="Edit2(<?php echo $row['ID']; ?>)" href ="ViewEdit.php?editId=<?php echo $row['ID']; ?>"> Edit</a>
                   
              	</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			<input type="hidden" class="btn btn-primary" style="margin-top: -50px;width: 7%;margin-left: 68%;" onclick="Cancelclick()" value="Cancel">
             <input type="hidden" class="btn btn-primary" style="margin-top: -50px;width: 7%;margin-left: 77%;" onclick="Backclick()" value="Back">

            <script type="text/javascript">
              function Createclick(){
                 window.location.assign("index.html");
                }
				
   function Edit(etl){
            var editID = etl;
              $.ajax({
				url: "Edit.php",
				type: "Get",
				data: {
					htmlId: editID,
								
				},
				success: function (dataList) {
				var decoded=dataList;
              	EditView(decoded , editID)
        }
    });          
  }
  
function EditView(dataView , viewId){
	var arr=[];
	console.log(viewId);
	//var obj = JSON.parse(dataView); 
            var dataViewList = []; 
			var array = dataView.split('||');
			 for(var i in array) {
                dataViewList.push(array[i]);
              
			}
			console.log(dataViewList[0]); 

	const LandingPage = {
            html: dataViewList[0],
            css: dataViewList[1],
            components: null,
            style: dataViewList[2],
};

const editor = grapesjs.init({
    height: '100%',
    clearOnRender: true,
    container: '#gjs',
    plugins: ['gjs-preset-newsletter'],
    components: LandingPage.components || LandingPage.html,
    style: LandingPage.css || LandingPage.style,
    storageManager: {
	id: 'gjs-',             
    type: 'local',         
    autosave: true,         
    autoload: false, 
    
  },
 
})

}
</script>
</body>
</html>