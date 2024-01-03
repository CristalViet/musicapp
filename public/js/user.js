
    var list=Array();
   
    var Playlist=document.getElementById('Playlist');
    var listsongs=document.getElementById('listsongs');
    var listSongToAdd=JSON.parse(listsongs.dataset.listsong); 

    var selectedFile;
    var fileInput=document.getElementById('inputFile');
    var playlist_send=document.getElementById('playlist_send');
    var playlistForm=document.getElementById('formPlaylist');
    console.log(listSongToAdd);
    var divToShow=document.getElementById('divToShow');
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

function deleteItem(id){
   
    var BtnId=id;
    
    alert('đã click vào nút này');
    // if(list.includes(BtnId)){
    //     list = list.filter(item => item !== BtnId);
    //     console.log(BtnId);
    //     deleteDiv(BtnId);
    //     console.log('Đã click');
    // }
    console.log('test delete'+id);
    if(list.some(s=>s.id === id)){
        list = list.filter(item => item['id'] !== id);
        // console.log(song['id']);
        deleteDiv(BtnId);
     
        
     
    }
    PrintList();
    // Changdisabled();
    console.log(list);
    
}
function deleteDiv(id){
    var divToRemove=document.getElementById('playlist_'+id);
    console.log('Hello'+divToRemove);
    if (divToRemove) {
        Playlist.removeChild(divToRemove);
    }
}
function addDiv(song,count){
    var BtnId=song['id'];
    var htmlString = `
    <div id="playlist_${BtnId}" class="list-group-item list-group-item-action d-flex justify-content-between" data-id="${BtnId}" >
      <p class="text-truncate">${count} <a href=""> bài hát ${song['title']}</a></p>
      <div  class="btn btn-primary">Bỏ</div>
    </div>
  `;        
        Playlist.innerHTML+=htmlString;

}
function PrintListSong(){
    var count1=0;
    listsongs.innerHTML='';
    listSongToAdd.forEach(song => {
        var htmlString=` <div id="${song.id}"  class="list-group-item list-group-item-action d-flex justify-content-between " data-id="${song.id}" data-title="${song.title}">
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
    list.forEach(song => {
        count++;
        addDiv(song,count);
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
     
        deleteItem(BtnId);
        var divSong= document.getElementById(BtnId);
        
        var btn=divSong.querySelector('.btn.btn-primary');
  
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

//Send form with listSong()
function sendFormPlaylist(){
    if(list.length>0)
    {   
        console.log('Bắt đầu test')
        console.log(playlist_send);
        playlist_send.value=JSON.stringify(list) ;  
        console.log(playlist_send.value);
        
        playlistForm.submit();
    }
    else alert('Vui lòng chọn bài hát')
    
}



function clickFile(){
        fileInput.click();
        fileInput.addEventListener('change',function(){
        selectedFile=fileInput.files[0];
        
        alert('Đã chọn tệp' + selectedFile.name);
        var contentDiv=`<p>Da chon ${selectedFile.name}</p>`;
        console.log(contentDiv);
        // divToShow.innerHTML=contentDiv;
        })
}
// function addFile(){
//     if(selectedFile==null){
//         alert('Hãy chọn tệp');

//     }
//     else{
//         // alert('Tải lên tệp thành công ' + selectedFile.name);
        
//         document.getElementById('uploadForm').submit();
//     }
       

// }