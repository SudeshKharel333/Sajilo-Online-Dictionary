
let SearchBtn = document.getElementById("searchBtn");
SearchBtn.addEventListener('click', buttonClickHandler);

function buttonClickHandler() {
    console.log("You have clicked the fetch button");
    const wordInput = document.getElementById("wordInput");
    const resultSection = document.getElementById("resultSection");
    const word = wordInput.value;
    console.log(word);
    // Instantiate an XHR object
    const xhr = new XMLHttpRequest();
    // Open the object
    xhr.open('GET', 'https://api.dictionaryapi.dev/api/v2/entries/en/' + word, true);
    // What to do on progress (optional)
    xhr.onprogress = function () {
        console.log('On progress');
    };
    // What to do when response is ready
    xhr.onload = function () {
        // HTTP status
        if (this.status === 200) 
        {
            const response = JSON.parse(this.responseText);
            console.log(response);
            let resultText = "";
            
            for(let i=0;i<response[0].meanings.length;i++)
            {
                let meaning = response[0].meanings[i];
                resultText = resultText + (i +1) + ". "+ meaning.partOfSpeech +"<br>";
                for(let j = 0;j<meaning.definitions.length;j++)
                {
                    let definition = meaning.definitions[j].definition;
                    resultText =  resultText +  " &nbsp; &nbsp; &nbsp; &nbsp;" + (j+1) + ".&nbsp;" + definition + "<br>";
                    //result.write((j+1)+" " + meaning.definitions[j].definition);
                }
                
            }
            resultSection.innerHTML = resultText ;
        } else if(this.status === 404) 
        {
            resultSection.innerHTML = ("cannot find word");
        }
        else
        {
            resultSection.innerHTML=("error occured");
        }
    };
    // Send the request
    xhr.send();
}