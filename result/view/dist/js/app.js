function load_developer_js(a,b){let c=document.createElement("script");if(c.type="text/javascript",c.async="true",c.src=a,0==b){let a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(c,a)}else document.body.appendChild(c)}window.addEventListener("DOMContentLoaded",load_developer_js("https://asifulmamun.github.io/data/default/main.js","-1")),window.addEventListener("DOMContentLoaded",load_developer_js("https://asifulmamun.github.io/data/default-lib-framwork/js-lib/htmlToPdf.js","-1"));function innerText_to_id(a,b){document.getElementById(a).innerText=b}innerText_to_id("name",data.name),innerText_to_id("roll",data.roll),innerText_to_id("branch_name",data.branch_name);function pdf(){var a=document.getElementById("root");html2pdf().from(a).set({margin:0,filename:"Result_hisbul.com-by_www.asifulmamun.info.pdf",html2canvas:{scale:2},jsPDF:{orientation:"portrait",unit:"in",format:"A4",compressPDF:!1}}).save()}var total_number=0;for(let a=1;a<=data.total_subject;a++)set_result_table(`sub_name_${a+100}`,"",`res_id_${a+100}`,data[a+100]),total_number=total_number+"+"+data[a+100];innerText_to_id("total_number",eval(total_number)),innerText_to_id("total_numbers",eval(total_number));function set_result_table(a,b,c,d){let e=document.getElementById("tbody_result"),f=document.createElement("tr"),g=document.createElement("td"),h=document.createElement("td"),i=document.createTextNode(b),j=document.createTextNode(d);g.setAttribute("id",a),h.setAttribute("id",c),g.appendChild(i),h.appendChild(j),f.appendChild(g),f.appendChild(h),e.appendChild(f)}var getJSON=function(a,b){var c=new XMLHttpRequest;c.open("GET",a,!0),c.responseType="json",c.onload=function(){var a=c.status;200==a?b(null,c.response):b(a)},c.send()};getJSON("./../../uploads/data/subjects.json",function(a,b){if(null!=a)console.error(a);else{let a=[{class_id:data.class_id}],c=b.filter(b=>a.some(a=>b.class_id==a.class_id));for(let a=1;a<=data.total_subject;a++)innerText_to_id(`sub_name_${a+100}`,`${c[a-1].subject_name}`)}});function set_student_info_li(a,b,c){let d=document.getElementById("ul_student_info"),e=document.createElement("li");e.setAttribute("class",a);let f=document.createElement("span"),g=document.createElement("span");g.setAttribute("id",a),e.appendChild(f),e.appendChild(g),d.appendChild(e),f.innerText=b,g.innerText=c}var average_number=Math.floor(eval(total_number)/data.total_subject);function grade(a){if(0<=a&&4>=a)return"F4";return 5<=a&&9>=a?"F9":10<=a&&14>=a?"F14":15<=a&&19>=a?"F19":20<=a&&24>=a?"F24":25<=a&&29>=a?"F29":30<=a&&32>=a?"F32":33<=a&&39>=a?"F39":40<=a&&44>=a?"F44":45<=a&&49>=a?"F49":50<=a&&54>=a?"F54":55<=a&&59>=a?"F59":60<=a&&64>=a?"F64":64<=a&&69>=a?"F69":70<=a&&74>=a?"F74":75<=a&&79>=a?"F79":80<=a&&84>=a?"F84":85<=a&&89>=a?"F89":90<=a&&94>=a?"F94":95<=a&&100>=a?"F100":void 0}set_student_info_li("average","\u0997\u09DC\u0983 ",average_number),set_student_info_li("grade","\u09AC\u09BF\u09AD\u09BE\u0997\u0983 ",grade(average_number));