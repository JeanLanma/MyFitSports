import{o as s,d as o,a as t,b as n,w as h,e as l,F as _,f,t as a,u as p,g as u}from"./app-CapjUmtj.js";import{F as m}from"./Format-ktr5U8yQ.js";import{_ as w}from"./NavigationButton-C2fOsTv0.js";const x={class:"w-full antialiased bg-gray-100 text-gray-600"},g={class:"flex flex-col justify-center h-full"},v={class:"w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200"},b={class:"px-5 py-4 border-b border-gray-100 flex flex-col md:flex-row justify-between"},y=t("h2",{class:"font-bold text-gray-800 text-2xl"},"Clientes",-1),k={class:"p-3"},N={class:"overflow-x-auto"},j={class:"table-auto w-full"},C=t("thead",{class:"text-xs font-semibold uppercase text-gray-400 bg-gray-50"},[t("tr",null,[t("th",{class:"p-2 whitespace-nowrap"},[t("div",{class:"font-semibold text-left"},"Nombre")]),t("th",{class:"p-2 whitespace-nowrap"},[t("div",{class:"font-semibold text-left"},"Peso")]),t("th",{class:"p-2 whitespace-nowrap"},[t("div",{class:"font-semibold text-left"},"Talla")]),t("th",{class:"p-2 whitespace-nowrap"},[t("div",{class:"font-semibold text-left"},"Altura")]),t("th",{class:"p-2 whitespace-nowrap"},[t("div",{class:"font-semibold text-left"},"Ultima actualización")]),t("th",{class:"p-2 whitespace-nowrap"},[t("div",{class:"font-semibold text-left"},"...")])])],-1),F={key:0,class:"text-sm divide-y divide-gray-100"},T={class:"p-2 whitespace-nowrap"},V={class:"flex items-center"},B={class:"font-medium text-gray-800"},z={class:"p-2 whitespace-nowrap"},A={class:"flex items-center"},D={class:"font-bold text-gray-700"},L=t("small",null,"kg",-1),E={class:"p-2 whitespace-nowrap cursor-default text-indigo-400 font-bold"},O={class:"text-left font-bold"},P={class:"p-2 whitespace-nowrap cursor-default"},S=t("small",null,"cm",-1),U={class:"p-2 whitespace-nowrap cursor-default"},$={class:"p-2 whitespace-nowrap cursor-default"},q=["href"],G={key:1},H={class:"p-2 whitespace-nowrap",colspan:"6"},I={class:"flex items-center justify-center"},J={class:"font-medium text-gray-800"},K=["href"],M={class:"flex justify-center"},Y={__name:"CustomersList",props:{customers:Object},setup(r){const c=r;return(i,Q)=>{var d;return s(),o("section",x,[t("div",g,[t("div",v,[t("header",b,[y,n(w,{visit:i.route("customers.create"),class:"max-w-md text-sky-600"},{default:h(()=>[l(" Agregar cliente ")]),_:1},8,["visit"])]),t("div",k,[t("div",N,[t("table",j,[C,((d=c.customers)==null?void 0:d.data.length)>0?(s(),o("tbody",F,[(s(!0),o(_,null,f(c.customers.data,e=>(s(),o("tr",{key:e.id,class:"h-14 hover:bg-sky-300 hover:shadow-md"},[t("td",T,[t("div",V,[t("div",B,a(e.name),1)])]),t("td",z,[t("div",A,[t("div",D,[l(a(e.weight)+" ",1),L])])]),t("td",E,[t("div",O,a(e.size??"n/a"),1)]),t("td",P,[l(a(e.height)+" ",1),S]),t("td",U,a(p(m).TimestampToDate(e.updated_at)),1),t("td",$,[t("a",{href:i.route("customers.show",e.id),class:"text-left font-medium text-indigo-500 hover:text-sky-500 duration-150 hover:underline underline-offset-2"},"ver detalle",8,q)])]))),128))])):(s(),o("tbody",G,[t("tr",null,[t("td",H,[t("div",I,[t("p",J,[l(" No hay registros de clientes "),t("a",{class:"text-indigo-500 font-bold text-sm hover:underline hover:underline-offset-2",href:i.route("customers.create")},"agregar nuevo",8,K)])])])])]))])]),t("div",M,[u("",!0)])])])])])}}};export{Y as default};