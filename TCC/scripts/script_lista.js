var pesq = document.getElementById('pesq');

function searchData()
{
    window.location = 'lista.php?search='+pesq.value;
}