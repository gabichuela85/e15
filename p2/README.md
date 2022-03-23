
# Project 2
+ By: *Gaby Brown*
+ Production URL: <http://e15p2.gabybrown.me>

## Outside resources

## Notes for instructor
I attempted to use the following in the first text box input as a validator 
``` $movieArray = [];
        foreach ($movies as $slug=>$movie) {
            array_push($movieArray, $movie['title']);
        }
        //$movieArray = implode(', ', $movieArray);
    
        Validator::make($title, [
            'title' => [
                'required',
                Rule::in([$movieArray]),
            ],
        ]); 
```
But I was unable to get it to validate. I tried running it both as a string and as an array, but didn't have any success. A list of movies can be found at [/movies](e15p2.gabybrown.me/movies). All of the form validation required for the assignment is on the review page, which you access after picking a movie. 

I tried to dive a little deeper into bootstrap for styling, though I know that wasn't a requirement. 



