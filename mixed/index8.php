<script>
function tiklaa ()
{
var yazi = document.getElementById("txt").value;

if(yazi=="abc")
{
    document.getElementById("txt").value="+";
}
else
{
    document.getElementById("txt").value="-";
}
}

//js kelime değiştirme

</script>


<form>
<input id="txt" type="text" name="degis">
<input type="submit" name="tikla" value="tıkla" onclick="tiklaa()">
</form>
<br/>

<div id="kutu"></div>
