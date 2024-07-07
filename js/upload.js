const firebaseConfig = {
  apiKey: "AIzaSyBWw1mR6GirRER5KyDnOjlVZLrwxtH9oZs",
  authDomain: "nscodeuploadtask-a2dfd.firebaseapp.com",
  projectId: "nscodeuploadtask-a2dfd",
  storageBucket: "nscodeuploadtask-a2dfd.appspot.com",
  messagingSenderId: "268362436967",
  appId: "1:268362436967:web:14a5782f4a73f80a3e9fc2",
  measurementId: "G-8VLEKZ5CQZ"
};

firebase.initializeApp(firebaseConfig);

let fileInput = document.querySelector(".fileInput");


let uploadImage = () => {
    let fileName = fileInput.files[0].name;
    let storageRef = firebase.storage().ref("images/"+fileName);
    let uploadTask = storageRef.put(fileInput.files[0]);

    uploadStatusArea.innerHTML = `Uploading ${fileName}...`;

    uploadTask.on('state_changed', function(snapshot){
      let progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
      uploadStatusArea.innerHTML = `Upload is ${progress}% done`;
      switch (snapshot.state) {
        case firebase.storage.TaskState.PAUSED: 
          uploadStatusArea.innerHTML = 'Upload is paused';
          break;
        case firebase.storage.TaskState.RUNNING: 
          uploadStatusArea.innerHTML = 'Upload is running';
          break;
      }
    }, function(error) {
      uploadStatusArea.innerHTML = `Upload failed with error: ${error}`;
    }, function() {
      uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
        let img = document.querySelector(".img");
        img.src = downloadURL;
        img.alt = fileName;
        uploadStatusArea.innerHTML = `Uploaded Succesfully`;
      });
    });
}