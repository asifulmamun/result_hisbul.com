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

// Get Json function
var getJSON = function (url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';

    xhr.onload = function () {

        var status = xhr.status;

        if (status == 200) {
            callback(null, xhr.response);
        } else {
            callback(status);
        }
    };

    xhr.send();
};

// Function for set value innerText to Specific Id
function innerText_to_id(id_name, value_for_innerText) {
    document.getElementById(id_name).innerText = value_for_innerText;
}


// Heading - result table
function res_th(th_txt, th_atr_name, th_atr_value) {
    let tr_res_head = document.getElementById('heading_inst_res');
    let th = document.createElement('th');
    th.innerText = th_txt;
    th.setAttribute(th_atr_name, th_atr_value);
    tr_res_head.appendChild(th);
}

// Result Table Row - result table
function res_tr(tr_atr, tr_atr_val) {
    let inst_tbl = document.getElementById('inst_tbl_bdy');
    let tr = document.createElement('tr');
    tr.setAttribute(tr_atr, tr_atr_val);
    inst_tbl.appendChild(tr);
}

// Result Table Data - result table
function res_td(td_txt, select_id, td_atr_name, td_atr_value) {
    let tr_res = document.getElementById(select_id);
    let td = document.createElement('td');
    td.innerText = td_txt;
    td.setAttribute(td_atr_name, td_atr_value);
    tr_res.appendChild(td);
}


// Result Added with subjects
getJSON('./../../uploads/data/subjects.json', function (err, get_subjects) {
    // If json data found
    if (err != null) {
        console.error(err);
    } else {

        // Search Item
        let searchItem = [{
            "class_id": data[0]['class_id']
        }];

        // Searching
        let subjects = get_subjects.filter(
            f => searchItem.some(
                s => f['class_id'] == s['class_id']
            )
        );

        // table heading create
        res_th('SL', 'id', 'res_th_id');
        res_th('Roll', 'id', 'res_th_roll');
        res_th('Name', 'id', 'res_th_name');
        // Subject added to list
        for (let i = 1; i <= subjects.length; i++) {
            res_th(`${subjects[i - 1]['subject_name']}`, 'id', `res_sub_${i - 1}`);
        }
        res_th('Total', 'id', 'res_th_total');

        for (let i = 1; i <= data.length; i++) {
            // tr and td
            res_tr('id', `res_${i}`);
            res_td(`${i}`, `res_${i}`, `class`, 'sl');
            res_td(`${data[i - 1]['roll']}`, `res_${i}`, `class`, 'roll');
            res_td(`${data[i - 1]['name']}`, `res_${i}`, `class`, 'name');

            let total = []; // total array

            // td - Result
            for (let j = 1; j <= subjects.length; j++) {
                res_td(`${data[i - 1][100 + j]}`, `res_${i}`, `class`, 'result');

                // adding to total
                total += data[i - 1][100 + j] + '+0+';

            }
            total += 0; // total added 0 at post not pre
            // Total printed
            res_td(`${eval(total)}`, `res_${i}`, `class`, 'total');

        }
    }
});

// Set exam name
innerText_to_id('exam_name', data[0]['exam_name']);