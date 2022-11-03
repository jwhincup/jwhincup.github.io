# wp-animated-text-plugin

Animate headlines and text with ease using our friendly UI and shortcode.


###How to apply the custom animation?

##Rules

+ Animation name: ymese_[container class]_[animation text's span class]
Example: the animation name is ymese_container_change-blue. The plugin will generate this html snippet:
```html
 <div class="container "><h1>		
    <span>Hello</span>
    <span class="change-blue">
        <b class="is-visible">World</b>
    </span>
    <span>Ymese</span></h1>
 </div>
```

+ You only need to modify the file public/css/wp-animated-text-plugin-public.css if you want to apply the style for your animation
Example for the above animation:
```css
    .container .change-blue {
        color: blue;
    }
```

Happy coding!