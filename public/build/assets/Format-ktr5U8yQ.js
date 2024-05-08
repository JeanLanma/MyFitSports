const r=t=>new Date(t).toISOString().split("T")[0].split("-").join("/"),e=t=>"$"+t.toString().replace(/\B(?=(\d{3})+(?!\d))/g,","),o={TimestampToDate:r,FormatPrice:e};export{o as F};
