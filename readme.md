<div>■更新日時</div>
    <script>
        //今日の日付データを変数に格納
        //変数は"today"とする
        var today=new Date();
        //年・月・日・曜日を取得
        var year = today.getFullYear();
        var month = today.getMonth()+1;
        var week = today.getDay();
        var day = today.getDate();
        
        var week_ja= new Array("日","月","火","水","木","金","土");
        //年・月・日・曜日を書き出す
        ocument.write(year+"年"+month+"月"+day+"日 "+week_ja[week]+"曜日");
    </script>
    <br>
    <script>
        //時刻データを取得して変数に格納する
        //変数は"time"とする
        var time= new Date();
        //時・分・秒を取得
        var hour = time.getHours();
        var minute = time.getMinutes();
        var second = time.getSeconds();
        document.write(hour+"時",+minute+"分"+second+"秒");
    </script>
## ■ アプリ名
&emsp;サプリメント管理アプリ(Supplement_document)<br>
<br>
## ■ アプリ詳細
&emsp;サプリメントの飲み忘れを防止・管理するアプリ<br>
<br>
    </body>
</html>
