import{k as l,s as i,o,d as u,a as c,t as d,r as m,D as p}from"./app-BU2BsgmQ.js";const f={class:"text-sm text-red-600"},v={__name:"InputError",props:{message:String},setup(s){return(t,e)=>l((o(),u("div",null,[c("p",f,d(s.message),1)],512)),[[i,s.message]])}},_=["value"],h={__name:"TextInput",props:{modelValue:String},emits:["update:modelValue"],setup(s,{expose:t}){const e=m(null);return p(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),t({focus:()=>e.value.focus()}),(r,a)=>(o(),u("input",{ref_key:"input",ref:e,class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",value:s.modelValue,onInput:a[0]||(a[0]=n=>r.$emit("update:modelValue",n.target.value))},null,40,_))}};export{h as _,v as a};
