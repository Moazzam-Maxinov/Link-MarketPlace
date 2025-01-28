import ReactDOM from "react-dom/client";
import React from "react";

function VendorDashboard() {
    return <div>Vendor</div>;
}

const rootElement = document.getElementById("vendor-dashboard");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<VendorDashboard />);
}

export default VendorDashboard;
