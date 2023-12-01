
    var list=Array();
   
    var Playlist=document.getElementById('Playlist');
    var listsongs=document.getElementById('listsongs');
    var listSongToAdd=JSON.parse(listsongs.dataset.listsong); 
    var selectedFile;
    var fileInput=document.getElementById('inputFile');
    var fileInfoDiv=document.getElementById('fileInfo'); 
    var fileInfoDiv2=document.getElementById('fileInfo2'); 
    console.log(listSongToAdd);
    PrintListSong();
function Test(){
    console.log('Hello')
}
function creatDiv(){
    
}
function clickItem(id,title){
   
    var song={id:id,title:title};
    console.log(song);
    // var song_id=Btn.addEventListener

    if(!list.some(s=>s.id ===id)){
        list.push(song);
        
     
    }
    console.log(list);
    PrintList();

}

function deleteItem(Id){
   
    var BtnId=Id;
    
    alert('đã click vào nút'+'');
    if(list.includes(BtnId)){
        list = list.filter(item => item !== BtnId);
        console.log(BtnId);
        deleteDiv(BtnId);
        console.log('Đã click');
    }
    PrintList();
    Changdisabled();
    console.log(list);
    
}
function deleteDiv(id){
    var divToRemove=document.getElementById('playlist_'+id);

    if (divToRemove) {
        Playlist.removeChild(divToRemove);
    }
}
function addDiv(id,count){
    var BtnId=id;
    var htmlString = `
    <div id="playlist_${BtnId}" class="list-group-item list-group-item-action d-flex justify-content-between" data-id="${BtnId}" >
      <p class="text-truncate">${count} <a href=""> bài hát ${BtnId}</a></p>
      <div  class="btn btn-primary">Bỏ</div>
    </div>
  `;        
        Playlist.innerHTML+=htmlString;

}
function PrintListSong(){
    var count1=0;
    listSongToAdd.forEach(song => {
        var htmlString=` <div id="${song.id}"  class="list-group-item list-group-item-action d-flex justify-content-between " data-id="${song.id} data-id="${song.title}">
        <p class="text-truncate">${count1} <a href="">${song.title} </a></p>
        <div  class="btn btn-primary" >chọn</div>
    </div>`;
        listsongs.innerHTML+=htmlString;
        count1++;
    });
}

function PrintList(){
    Playlist.innerHTML='';
    var count=-1;
    list.forEach(songid => {
        count++;
        addDiv(songid,count);
    });
}
function Changdisabled(id) {
    
}
Playlist.addEventListener('click',function(event){
    var target = event.target;
    console.log("Da click")

    
    if (target.classList.contains('btn')) {
        var BtnId = target.parentNode.dataset.id; // Lấy data-id từ phần tử cha
        // target.classList.add('disabled')
        console.log("Hello"+BtnId);
        deleteItem(BtnId);
        var divSong= document.getElementById(BtnId);
        
        var btn=divSong.querySelector('.btn.btn-primary');
        console.log(btn);
        btn.classList.remove('disabled');
    }
}); 
listsongs.addEventListener('click',function(event){
    var target = event.target;
    console.log("Da click")
  
    if (target.classList.contains('btn')) {
        var BtnId = target.parentNode.dataset.id // Lấy data-id từ phần tử cha
        var title = target.parentNode.dataset.title //lấy title
        target.classList.add('disabled')
        console.log(BtnId);
        clickItem(BtnId,title);
    }
});



// function clickFile(){
//         fileInput.click();
//         fileInput.addEventListener('change',function(){
//         selectedFile=fileInput.files[0];
        
//         alert('Đã chọn tệp' + selectedFile.name);
//         fileInfoHTML='<p> tên tệp:'+selectedFile.name +'</p>'
//                       +'<p> kích thước:'+selectedFile.size/1024+'kb' +'</p>';

//         fileInfoDiv.innerHTML=fileInfoHTML;
//         });
// }
// function addFile(){
//     if(selectedFile==null){
//         alert('Hãy chọn tệp');

//     }
//     else{
//         // alert('Tải lên tệp thành công ' + selectedFile.name);
        
//         document.getElementById('uploadForm').submit();
//     }
       

// }