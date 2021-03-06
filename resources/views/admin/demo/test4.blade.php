<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .editButtons span{
            display:inline-block;
            white-space:nowrap;
        }
        [data-edit] {
            float:left;
            border:0;
            font: 12px/1 monospace;
            background:#ddd;
            padding:4px 8px;
        }
        [contenteditable] {
            padding:4px 16px;
            background:#eee;
        }
    </style>
</head>
 
<body>
    <div class="editButtons">
 
        <span title="STYLES">
            <!-- 加粗 -->
            <button data-edit="bold"><b>B</b></button>
            <!-- 斜体 -->
            <button data-edit="italic"><i>I</i></button>
            <!-- 下划线 -->
            <button data-edit="underline"><u>U</u></button>
            <!-- 中划线 -->
            <button data-edit="strikeThrough"><s>S</s></button>
        </span>
 
        <span title="TEXT FORMAT">
            <!-- 字体标签设置 -->
            <button data-edit="formatBlock:p">P</button>
            <button data-edit="formatBlock:H1">H1</button>
            <button data-edit="formatBlock:H2">H2</button>
            <button data-edit="formatBlock:H3">H3</button>
        </span>
 
        <span title="FONT SIZE">
            <!-- 字体大小设置 -->
            <button data-edit="fontSize:1">s</button>
            <button data-edit="fontSize:3">M</button>
            <button data-edit="fontSize:5">L</button>
        </span>
 
        <span title="LISTS">
            <!-- 列表格式设置 -->
            <button data-edit="insertUnorderedList">UL</button>
            <button data-edit="insertOrderedList">OL</button>
        </span>
 
        <span title="ALIGNMENT">
            <!-- 文本对齐设置 -->
            <button data-edit="justifyLeft">&#8676;</button>
            <button data-edit="justifyCenter">&#8596;</button>
            <button data-edit="justifyRight">&#8677;</button>
        </span>
 
        <span title="CLEAR FORMATTING">
            <!-- 清除文本 -->
            <button data-edit="removeFormat">&times;</button>
        </span>
 
        <span title="COPY">
            <!-- 复制选中文本 -->
            <button data-edit="copy">C</button>
        </span>
    </div>
 
    <div contenteditable id="textbox">
        <p>文本编辑器</p>
    </div>
 
</body>
<script>
    document.querySelectorAll("[data-edit]").forEach(btn =>
        btn.addEventListener("click", function (ev) {
            ev.preventDefault();
            console.log(this.getAttribute("data-edit"))
            const cmd_val = this.getAttribute("data-edit").split(":");
            if(cmd_val[0] == 'copy'){ // 复制选中的文本
                document.execCommand(cmd_val[0]);
            }else{
                document.execCommand(cmd_val[0], false, cmd_val[1]);
            }
            
        })
    );
 
    
</script>
 
</html>