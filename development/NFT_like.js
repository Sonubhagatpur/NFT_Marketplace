function saveLike(type, NFT_id, NFT_name, User_address, NFT_image) {
    var formdata = new FormData();
    formdata.append('type', type);
    formdata.append("NFT_id", NFT_id);
    formdata.append('NFT_name', NFT_name);
    formdata.append("User_address", User_address);
    formdata.append('NFT_image', NFT_image);

    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };
    fetch("./api/NFT_like.php", requestOptions)
        .then(response => response.text())
        .then(result => {
        })
        .catch(error => console.log('error', error));
}

function getLike(type, NFT_id, User_address) {
    return new Promise((resolve, reject) => {
        try {
            var formdata = new FormData();
            formdata.append('type', type);
            formdata.append("NFT_id", NFT_id);
            formdata.append('User_address', User_address)
            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };
            fetch("./api/NFT_like.php", requestOptions)
                .then(response => response.json())
                .then(result => {
                    resolve(result);
                })
                .catch((error) => {
                    reject(error)
                });

        } catch (error) {
            reject(error)
        }
    })
}


