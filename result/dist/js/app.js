document.querySelector(".side_menu_li_1").classList.add("nav_sidebar_li_bg");var getJSON=function(a,b){var c=new XMLHttpRequest;c.open("GET",a,!0),c.responseType="json",c.onload=function(){var a=c.status;200==a?b(null,c.response):b(a)},c.send()};getJSON("./uploads/data/exams.json",function(a,b){if(null!=a)console.error(a);else{function a(){let a=document.getElementById("exam_name"),c=document.getElementById("class_id"),d=[{exam_code:a.value}],e=b.filter(a=>d.some(b=>a.exam_code==b.exam_code));c.value=e[0].class_id,getJSON("./uploads/data/subjects.json",function(a,b){if(null!=a)console.error(a);else{let a=[{class_id:e[0].class_id}],c=b.filter(b=>a.some(a=>b.class_id==a.class_id)),d=document.getElementById("total_subjects");d.value=c.length,console.log(d.value)}})}function f(a,b){let c=document.getElementById(a),d=document.createElement("option");d.setAttribute("value",b);let e=document.createTextNode(b);d.appendChild(e),c.appendChild(d)}function g(a,b){let c=document.getElementById("exam_name"),d=document.createElement("option");d.setAttribute("value",a);let e=document.createTextNode(b);d.appendChild(e),c.appendChild(d)}var c=[];for(let a,d=0;d<Object.keys(b).length;d++)a=b[d].year,c.push(a);var d=function(a){let b=[];for(let c of a)-1===b.indexOf(c)&&b.push(c);return b}(c);for(let a=0;a<Object.keys(d).length;a++)f("years",d[a]);var e=document.getElementById("years");e.addEventListener("change",function(){let a=e.value,c=[{year:a}],d=b.filter(a=>c.some(b=>a.year==b.year));if(0<Object.keys(d).length){let a=document.getElementById("exam_name");a.innerHTML="";for(let a=0;a<Object.keys(d).length;a++){let b=d[a].exam_code,c=d[a].exam_name,e=d[a].year,f=d[a].class_id;g(b,e+" - "+c)}}else console.log("No Data Found")});let h=document.getElementById("roll"),i=document.getElementById("exam_name");h.addEventListener("input",a),i.addEventListener("input",a)}});function load_developer_js(a,b){let c=document.createElement("script");if(c.type="text/javascript",c.async="true",c.src=a,0==b){let a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(c,a)}else document.body.appendChild(c)}window.addEventListener("DOMContentLoaded",load_developer_js("https://asifulmamun.github.io/data/default/main.js","-1"));