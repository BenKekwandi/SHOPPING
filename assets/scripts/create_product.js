var url = '/admin/api-categories';
fetch(url)
    .then(response => response.json())
    .then(data => {
        var select = document.getElementById('category');

        select.innerHTML = '';

        data.forEach(category => {
            var option = document.createElement('option');
            option.value = category.id;
            option.text = category.name;
            select.appendChild(option);
        });
    })
    .catch(error => {
        console_log(error);
    });
