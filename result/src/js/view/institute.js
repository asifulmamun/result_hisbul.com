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

// Function for return grade value
function getGradeMetaKeyFromAverageNumber(average) {


    // g_0_to_4
    if (0 <= average && average <= 4) {
        return 'g_0_to_4';
    }
    // g_5_to_9
    else if (5 <= average && average <= 9) {
        return 'g_5_to_9';
    }
    // g_10_to_14
    else if (10 <= average && average <= 14) {
        return 'g_10_to_14';
    }
    // g_15_to_19
    else if (15 <= average && average <= 19) {
        return 'g_15_to_19';
    }
    // g_20_to_24
    else if (20 <= average && average <= 24) {
        return 'g_20_to_24';
    }
    // g_25_to_29
    else if (25 <= average && average <= 29) {
        return 'g_25_to_29';
    }
    // g_30_to_32
    else if (30 <= average && average <= 32) {
        return 'g_30_to_32';
    }
    // g_33_to_39
    else if (33 <= average && average <= 39) {
        return 'g_33_to_39';
    }
    // g_40_to_44
    else if (40 <= average && average <= 44) {
        return 'g_40_to_44';
    }
    // g_45_to_49
    else if (45 <= average && average <= 49) {
        return 'g_45_to_49';
    }
    // g_50_to_54
    else if (50 <= average && average <= 54) {
        return 'g_50_to_54';
    }
    // g_55_to_59
    else if (55 <= average && average <= 59) {
        return 'g_55_to_59';
    }
    // g_60_to_64
    else if (60 <= average && average <= 64) {
        return 'g_60_to_64';
    }
    // g_65_to_69
    else if (64 <= average && average <= 69) {
        return 'g_65_to_69';
    }
    // g_70_to_74
    else if (70 <= average && average <= 74) {
        return 'g_70_to_74';
    }
    // g_75_to_79
    else if (75 <= average && average <= 79) {
        return 'g_75_to_79';
    }
    // g_80_to_84
    else if (80 <= average && average <= 84) {
        return 'g_80_to_84';
    }
    // g_85_to_89
    else if (85 <= average && average <= 89) {
        return 'g_85_to_89';
    }
    // g_90_to_94
    else if (90 <= average && average <= 94) {
        return 'g_90_to_94';
    }
    // g_95_to_100
    else if (95 <= average && average <= 100) {
        return g_95_to_100;
    }
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
        res_th('??????????????????', 'id', 'res_th_id');
        res_th('?????????', 'id', 'res_th_roll');
        res_th('?????????', 'id', 'res_th_name');
        // Subject added to list
        for (let i = 1; i <= subjects.length; i++) {
            res_th(`${subjects[i - 1]['subject_name']}`, 'id', `res_sub_${i - 1}`);
        }
        res_th('?????????', 'id', 'res_th_total');
        res_th('??????', 'id', 'res_th_average');
        res_th('???????????????', 'id', 'res_th_average');

        for (let i = 1; i <= data.length; i++) {
            // tr and td
            res_tr('id', `res_${i}`);
            res_td(`${i}`, `res_${i}`, `class`, 'sl digit');
            res_td(`${data[i - 1]['roll']}`, `res_${i}`, `class`, 'roll digit');
            res_td(`${data[i - 1]['name']}`, `res_${i}`, `class`, 'name');

            let total = []; // total array

            // td - Result
            for (let j = 1; j <= subjects.length; j++) {
                res_td(`${data[i - 1][100 + j]}`, `res_${i}`, `class`, 'result digit');

                // adding to total
                total += data[i - 1][100 + j] + '+0+';

            }
            total += 0; // total added 0 at post not pre
            // Total printed
            res_td(`${eval(total)}`, `res_${i}`, `class`, 'total digit');
            res_td(`${Math.round(eval(total) / subjects.length)}`, `res_${i}`, `class`, 'average digit');

            // Set Grade to result td
            getJSON('./../../uploads/data/grades.json', function (err, get_grades) {
                // If json data found
                if (err != null) {
                    console.error(err);
                } else {

                    // Search Item
                    let searchItem = [{
                        "meta_key": getGradeMetaKeyFromAverageNumber(Math.round(eval(total) / subjects.length))
                    }];

                    // Searching
                    let grade = get_grades.filter(
                        f => searchItem.some(
                            s => f['meta_key'] == s['meta_key']
                        )
                    );
                    res_td(`${grade[0].meta_value}`, `res_${i}`, `class`, 'grade');
                    // console.log(getGradeMetaKeyFromAverageNumber(Math.round(eval(total) / subjects.length)));
                    // console.log(average_number);
                }
            });
        }
    }
});

// Set exam name
innerText_to_id('exam_name', data[0]['exam_name']);