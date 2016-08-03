    function add_new_data() { //新增部分
     //先取得目前的row數
     var num = document.getElementById("mytable").rows.length;
     //建立新的tr 因為是從0開始算 所以目前的row數剛好為目前要增加的第幾個tr
     var Tr = document.getElementById("mytable").insertRow(num);
     //建立新的td 而Tr.cells.length就是這個tr目前的td數
     Td = Tr.insertCell(Tr.cells.length);
     //而這個就是要填入td中的innerHTML
     Td.innerHTML='<input name="name[]" type="text" size="12" style="width:199px">';
     //這裡也可以用不同的變數來辨別不同的td (我是用同一個比較省事XD)
     Td = Tr.insertCell(Tr.cells.length);
     Td.innerHTML='<input name="content[]" type="text" size="12" style="width:199px">';
     //這樣就好囉 記得td數目要一樣 不然會亂掉~
    }
    
    function remove_data() {  //刪除部分
     //先取得目前的row數
     var num = document.getElementById("mytable").rows.length;
     //防止把標題跟原本的第一個刪除XD
     if(num >2)
     {
      //刪除最後一個
      document.getElementById("mytable").deleteRow(-1);
     }
    }