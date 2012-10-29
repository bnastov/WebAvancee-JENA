package um2.websemantique.entities.apicallers;

import java.net.URL;

import um2.websemantique.entities.utils.GeneratorFromJSON;

public class FacebookAuthorApiCaller {
	/**
	 * 
	 * @var Oauth of facebook
	 */
	private String key = "AAACEdEose0cBAHNUPuG1JMXhAXFDZATXYDv3ZB5uhVK7dvsgkBG4JJwL91MfL8kVSf0SWb1eDrVZCtxAWvXffJzxHIrSEvXJcou0bZCE4Dbo647b2MPq";

	/**
	 * 
	 * @var uri to get the best page of an author
	 */
	private String url = "https://graph.facebook.com/search?limit=1&type=page&q=";

	/**
	 * 
	 * @var uri to get the details of the best page
	 */
	private String url_detail = "https://graph.facebook.com/";

	
	public String findAuthorFacebook(String author) {
		author = ApiCaller.urlEncode(author);
		String result = ApiCaller
				.cUrl(ApiCaller.getUrlFromString(url + author));
		result = GeneratorFromJSON.getIdAuthorFacebook(result);
		result = ApiCaller
				.cUrl(ApiCaller.getUrlFromString(url_detail + result));
		return result;
	}
}
