function addrankA()
{
     var cntInput = member_a.child;
     var div_element = document.createElement("div");
     div_element.innerHTML = '<br><input type="text" class="form-control" name="inputMemberRankA[]">';
     document.getElementById('member_a').appendChild(div_element);
}

function addrankB()
{
     var div_element = document.createElement("div");
     div_element.innerHTML = '<br><input type="text" class="form-control" name="inputMemberRankB[]">';
     document.getElementById('member_b').appendChild(div_element);
}

function addrankC()
{
     var div_element = document.createElement("div");
     div_element.innerHTML = '<br><input type="text" class="form-control" name="inputMemberRankC[]">';
     document.getElementById('member_c').appendChild(div_element);
}
