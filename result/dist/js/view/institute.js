function load_developer_js(a,b){let c=document.createElement("script");if(c.type="text/javascript",c.async="true",c.src=a,0==b){let a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(c,a)}else document.body.appendChild(c)}window.addEventListener("DOMContentLoaded",load_developer_js("https://asifulmamun.github.io/data/default/main.js","-1"));var getJSON=function(a,b){var c=new XMLHttpRequest;c.open("GET",a,!0),c.responseType="json",c.onload=function(){var a=c.status;200==a?b(null,c.response):b(a)},c.send()};function innerText_to_id(a,b){document.getElementById(a).innerText=b}function res_th(a,b,c){let d=document.getElementById("heading_inst_res"),e=document.createElement("th");e.innerText=a,e.setAttribute(b,c),d.appendChild(e)}function res_tr(a,b){let c=document.getElementById("inst_tbl_bdy"),d=document.createElement("tr");d.setAttribute(a,b),c.appendChild(d)}function res_td(a,b,c,d){let e=document.getElementById(b),f=document.createElement("td");f.innerText=a,f.setAttribute(c,d),e.appendChild(f)}getJSON("./../../uploads/data/subjects.json",function(err,get_subjects){if(null!=err)console.error(err);else{let searchItem=[{class_id:data[0].class_id}],subjects=get_subjects.filter(a=>searchItem.some(b=>a.class_id==b.class_id));res_th("SL","id","res_th_id"),res_th("Roll","id","res_th_roll"),res_th("Name","id","res_th_name");for(let a=1;a<=subjects.length;a++)res_th(`${subjects[a-1].subject_name}`,"id",`res_sub_${a-1}`);res_th("Total","id","res_th_total");for(let i=1;i<=data.length;i++){res_tr("id",`res_${i}`),res_td(`${i}`,`res_${i}`,`class`,"sl"),res_td(`${data[i-1].roll}`,`res_${i}`,`class`,"roll"),res_td(`${data[i-1].name}`,`res_${i}`,`class`,"name");let total=[];for(let a=1;a<=subjects.length;a++)res_td(`${data[i-1][100+a]}`,`res_${i}`,`class`,"result"),total+=data[i-1][100+a]+"+0+";total+=0,res_td(`${eval(total)}`,`res_${i}`,`class`,"total")}}});