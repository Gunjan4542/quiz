var m=10;
var s=00;
var flag=false;
var sourcelimit=1024;
function countdown()
{
    if(m<0)
    {
            document.getElementById('time').innerHTML="00:00";
            $('.tab').hide();
            $('.tabcontent').fadeOut('slow');
            return;
    }
    if(s==0 && m==0)
    {
        var str="";
        str+=m+":"+s;
        document.getElementById('time').innerHTML=str;
        if(!flag)
        {
            s=0;
            m=0;
            flag=true;
            $('#myPopup').show();
            $('#main').show();
            $('#submit').trigger('click');
        }
        return;
    }
    if(s==-1)
    {
        m=m-1;
        s=59;
    }
        var str="";
        var min=m<10?"0"+m:m;
        var sec=s<10?"0"+s:s;
        str+="<span style='background-color: black; color: white'>"+min+"</span>"+":"+"<span style='background-color: black; color: white'>"+sec+"</span>";
        document.getElementById('time').innerHTML=str;
        s--;
}
function getScore()
{
    $.post('getScore.php', function(data){
        $('#score').html(data);
    });
}

