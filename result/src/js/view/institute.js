// Load JS - Developer
function load_developer_js(js_url, position) {
    let developer_script = document.createElement('script');
    developer_script.type = 'text/javascript';
    developer_script.async = 'true';
    developer_script.src = js_url;

    if (position == 0) {
        // Set top of script as 1st postion
        let script = document.getElementsByTagName('script')[0];
        script.parentNode.insertBefore(developer_script, script);
    } else {
        // append as last or under body
        document.body.appendChild(developer_script);
    }
}
window.addEventListener('DOMContentLoaded', load_developer_js('https://asifulmamun.github.io/data/default/main.js', '-1'));

// Function for set value innerText to Specific Id
function innerText_to_id(id_name, value_for_innerText) {
    document.getElementById(id_name).innerText = value_for_innerText;
}

// console.log(data);


// // Set Results function call in loop
// var total_number = 0; // total number init
// for (let i = 1; i <= data.total_subject; i++) {
//     set_result_table(`sub_name_${i + 100}`, '', `res_id_${i + 100}`, data[i + 100]);
//     total_number = total_number + '+' + data[i + 100]; // adding total number as concate
// }



// // Set Result function
// function set_result_table(sub_name_id, sub_name, res_id, res_value) {
//     let tbody_result = document.getElementById('tbody_result');
//     let tr = document.createElement("tr");
//     let td_1 = document.createElement("td");
//     let td_2 = document.createElement("td");

//     let el_sub_name = document.createTextNode(sub_name);
//     let el_res_id = document.createTextNode(res_value);

//     td_1.setAttribute("id", sub_name_id);
//     td_2.setAttribute("id", res_id);

//     td_1.appendChild(el_sub_name);
//     td_2.appendChild(el_res_id);
//     tr.appendChild(td_1);
//     tr.appendChild(td_2);
//     tbody_result.appendChild(tr);
// }





// // Set student info li dynamically
// function set_student_info_li(class_and_id, key, value) {
//     let ul_student_info = document.getElementById('ul_student_info');
//     let li_ul_student_info = document.createElement('li');
//     li_ul_student_info.setAttribute('class', class_and_id);
//     let span_li_ul_student_info = document.createElement('span');
//     let span2_li_ul_student_info = document.createElement('span');
//     span2_li_ul_student_info.setAttribute('id', class_and_id);
//     li_ul_student_info.appendChild(span_li_ul_student_info);
//     li_ul_student_info.appendChild(span2_li_ul_student_info);
//     ul_student_info.appendChild(li_ul_student_info);

//     span_li_ul_student_info.innerText = key;
//     span2_li_ul_student_info.innerText = value;
// }

