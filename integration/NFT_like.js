function saveLike(type, NFT_id, User_address) {
    var formdata = new FormData();
    formdata.append('type', type);
    formdata.append("NFT_id", NFT_id);
    formdata.append("User_address", User_address);
    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };
    fetch("./NFT_like.php", requestOptions)
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
            fetch("./NFT_like.php", requestOptions)
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

function user(account) {
    return new Promise((resolve, reject) => {
        try {
            if (account == "" || account == undefined) return;
            var formdata = new FormData();
            formdata.append("address", account);

            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./checkNewUser.php", requestOptions)
                .then(response => response.text())
                .then(result => {
                    // console.log("result", result);
                    resolve(result);
                })
                .catch(error => console.log('error', error));
        } catch (error) {
            console.log(error, " error")
            reject(error)
        }
    })

}
