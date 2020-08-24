<?php
$htmlId=$_GET['editId'];

//echo $htmlId;

?>
<html><body>

<input hidden type="text" name="htmlid">      
      <input type="hidden" id="emaileditHtml" name="HtmlDesign">
      <input type="hidden" id="emaileditCSS" name="cssDesign" >
      <input type="hidden" id="emaileditStyle" name="styleDesign"><br>
      <input type="Cancel" class="btn btn-primary" style="float:right"  id="updateform" onclick="Cancelclick()" value="Cancel"> </td>
      <input type="Cancel" class="btn btn-primary" style="float:right;margin-right: 22px;"  id="updateform" onclick="UpdateClick(<?php echo $htmlId; ?>)" value="update"> </td>

<link href="grapesjs-dev/dist/css/grapes.min.css" rel="stylesheet" />
<link href="grapesjs-preset-newsletter-master/dist/grapesjs-preset-newsletter.css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="grapesjs-dev/dist/grapes.min.js"></script>
<script src="grapesjs-preset-newsletter-master/dist/grapesjs-preset-newsletter.min.js"></script>


    <br/><br/>
 
<br/><br/>
<div id="gjs"></div>
    <script type="text/javascript">
        var editor = grapesjs.init
    ({
      height: '100%',
      fromElement: 1,
      clearOnRender: true,
      container: '#gjs',
      plugins: ['gjs-preset-newsletter'],
      storageManager: {
        autosave: false,
    type: 'remote',
         contentTypeJson: true,
      },

      assetManager: {
        uploadFile: (e) => {
          window.alert("checked")
        },
      }
    });

    const assetManager = editor.AssetManager;
  assetManager.add([
    {
      category: 'c1',
      src: 'http://placehold.it/350x250/78c5d6/fff/image1.jpg',
    }, {
      category: 'c1',
      src: 'http://placehold.it/350x250/459ba8/fff/image2.jpg',
    }, {
      category: 'c2',
      src: 'http://placehold.it/350x250/79c267/fff/image3.jpg',
    }
    // ...
  ]);


 

var htmlid='<?php echo $htmlId;?>';
console.log(htmlid); 
  
$(document).ready(function()
{
 EditMet(htmlid);

});   

 function EditMet(htmlid)
 {
   var editID = htmlid;
        $.ajax({
          url: "Edit.php",
          type: "Get",
          data: {
              htmlId: editID                          
          },
          success: function (dataList) {
          var decoded=dataList;
          EditView(decoded , editID)
  }
});

 }
 function Cancelclick(){
  location.reload();
}
function EditView(dataView , viewId){
  debugger;
var arr=[];
console.log(viewId);
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

editor.load(res =>{
      editor.setComponents(LandingPage.html);
      editor.setStyle(LandingPage.css);
   }, err => {
      console.log("An error occured", err);
   });
/*
editor.on('load', () => {
   const rs = editor.StorageManager.get('remote-storage');
   rs.load(res => {
      editor.setComponents(LandingPage.html);
      editor.setStyle(LandingPage.css);
   }, err => {
      console.log("An error occured", err);
   });
});
*/

/*var editor = grapesjs.init({
height: '100%',
clearOnRender: true,
container: '#gjs',
plugins: ['gjs-preset-newsletter'],
components: LandingPage.components || LandingPage.html,
style: LandingPage.css || LandingPage.style,
storageManager: {
        autosave: false,
        setStepsBeforeSave: 1,
        type: 'remote',
        contentTypeJson: true,
      },
      assetManager: {
        uploadFile: (e) => {
          window.alert("checked")
        },
       
      }

})*/


}


function UpdateClick(editID){  
  debugger;
  var htmldata = editor.getHtml();
          var cssdata = editor.getCss();
          var htmlStl = JSON.stringify(editor.getStyle());
          var htmlId=editID;
          console.log(htmldata);
          console.log(cssdata);
          console.log(htmlStl);
          if(htmldata!="" && cssdata!="" && htmlStl!=""){
      	$.ajax({
				url: "update.php/UpdateData",
				type: "POST",
				data: {
					htmlData: htmldata,
					CSSData: cssdata,
					StyleData: htmlStl,
          htmlID:htmlId				
				},
				
			 success: function(dataResult){
         	
					alert("Saved in database"); 						
          window.location.assign("List.php");
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
     
        
}
</script>
</body>
</html>
