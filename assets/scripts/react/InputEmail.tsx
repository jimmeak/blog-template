import React from "react";


const ReactDom = require('react-dom')

const title: HTMLHeadingElement   = <h3>Email</h3>;
const label: HTMLParagraphElement = <p>You can insert your email here and it will be stolen for sure.</p>;
const control: HTMLInputElement   = <input type="email"/>

const emailInput: HTMLDivElement = (
    <div>
        {title}
        {label}
        {control}
    </div>
)

console.log(emailInput)

ReactDom.render(emailInput, document.getElementById('input'));
